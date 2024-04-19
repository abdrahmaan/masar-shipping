<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Role;
use App\Traits\EmployeeAccess;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    use EmployeeAccess;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $this->checkEmployeeHasAccess("view-role");


        $roles = Role::get()->groupBy("role")->toArray();

        // return dd($roles);

        return view("roles.view" , ["Data"=>$roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->checkEmployeeHasAccess("create-role");


        return view("roles.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->checkEmployeeHasAccess("create-role");


        $request->validate([
            "roleName" => "required|unique:roles,role",
        ],[
            "roleName.required" => "إسم الصلاحية مطلوب",
            "roleName.unique" => "إسم الصلاحية أو الوظيفة مسجل من قبل",
        ]);

        if (count($request->all()) < 3) {
            session()->flash("error","برجاء تحديد صلاحية على الأقل");
            return redirect()->back();
        }

        foreach ($request->except("_token") as $key => $value) {

            if ($key !== "roleName") {
                Role::create([
                    "role"=> $request->roleName,
                    "permission"=> $value,
                ]);
            }
        }
        session()->flash("message","تم إضافة الصلاحية بنجاح");
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($role)
    {

        $this->checkEmployeeHasAccess("edit-role");


        $roles = Role::where("role",$role)->orderBy("permission","ASC")
        ->pluck("permission")->toArray();

        return view("roles.update",["permissions"=>$roles, "role"=>$role]);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $role)
    {

        $this->checkEmployeeHasAccess("edit-role");


        if (count($request->all()) < 3) {
            session()->flash("error","برجاء تحديد صلاحية على الأقل");
            return redirect()->back();
        }

        $deletePrevious = Role::where("role",$role)->delete();

        if($deletePrevious){

            foreach ($request->except("_token") as $key => $value) {

                if ($key !== "roleName") {
                    Role::create([
                        "role"=> $role,
                        "permission"=> $value,
                    ]);
                }
            }
            session()->flash("message","تم تعديل الصلاحية بنجاح");
            return redirect()->back();
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($role)
    {

        $this->checkEmployeeHasAccess("delete-role");


        $deleteRole = Role::where("role",$role)->delete();
        $deleteEmployee = Employee::where("role",$role)->delete();

        if($deleteRole && $deleteEmployee){

            session()->flash("message","تم حذف الصلاحية والموظفين بنجاح");
            return redirect()->back();

        } else {

            session()->flash("error","يوجد مشكلة فى حذف الصلاحية");
            return redirect()->back();


        }
    }
}
