<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Role;
use App\Traits\EmployeeAccess;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    use EmployeeAccess;

    public function login_page(){
        return view("auth.login");
    }


    public function login_logic(Request $request){


        $username = $request->username;
        $password = $request->password;

       $user = Employee::where("username",$username)->where("password",$password)->first();

        if ($user) {

            $roles = Role::where("role",$user->role)->orderBy("permission","ASC")
            ->pluck("permission")->toArray();

            session()->put('user-data',$user);

            session()->put('permissions',$roles);

            return redirect("/dashboard");

        } else {

            session()->flash("error","تأكد من إسم المستخدم وكلمة المرور");

            return redirect("/login");
        }
    }

    public function logout(Request $request){


            session()->flush();
            return redirect("/login");
    }

    public function change_password_page() {

        return view("users.change-password");
    }

    public function change_password_logic(Request $request) {

        $request->validate([
            "oldPassword" => "required|min:6",
            "newPassword" => "required|min:6",
        ],[

            "oldPassword.required" => "كلمة السر القديمة مطلوبة",
            "oldPassword.min" => "أقل حروف لكلمة السر القديمة 6 حروف",
            "newPassword.required" => "كلمة السر الجديدة مطلوبة",
            "newPassword.min" => "أقل حروف لكلمة السر الجديدة 6 حروف",
        ]);

        $userID = session()->get("user-data")->id;
        $userData = Employee::where("id",$userID)->first();

        if ($request->oldPassword == $userData->password) {

            $query =  Employee::where("id",$userID)->update([
                    "password" => $request->newPassword
            ]);

            if ($query) {
                session()->flash("message","تم تغيير كلمة السر بنجاح");
                return redirect("/change-password");
            }
        } else {
            session()->flash("error","برجاء التأكد من كلمة السر القديمة");
            return redirect("/change-password");
        }

        return dd($userData);
    }

    function resetPassword($id) {

        // // $this->checkEmployeeHasAccess("reset-password-employees");

        $employee = Employee::findOrFail($id);

        $employee->password = "123456";

        $employee->save();

        session()->flash("message","تم إعادة تعيين كلمة السر 123456");

        return redirect()->back();

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        // $this->checkEmployeeHasAccess("view-employees");

        $id = $request->id;
        $name = $request->name;
        $phone = $request->phone;
        $role = $request->role;
        $perPage = $request->perPage ?? 20;




        $employee = Employee::query();

        $roles = Role::distinct()->pluck("role")->toArray();


        if (isset($id) && $id !== null) {
             $employee->where("id",$id);
        }

        if (isset($phone) && $phone !== null) {

             $employee->where('phone', 'like', '%' . $phone . '%')
                    ->orWhere('phoneTwo', 'like', '%' . $phone . '%');

        }
        if (isset($name) && $name !== null) {

             $employee->where('name', 'like', '%' . $name . '%');

        }

        if (isset($role) && $role !== null && $role !== "الكل") {

             $employee->where('role',$role);
        }


      $lastData = $employee->paginate($perPage)->withQueryString();


        return view("users.view" , ["Data" => $lastData, "Roles" => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // $this->checkEmployeeHasAccess("create-employees");


        $roles = Role::distinct()->pluck("role")->toArray();

        return view("users.create" , ["Data"=> $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $this->checkEmployeeHasAccess("create-employees");


        $request->validate([
            "name" => "required",
            'username' => 'required|unique:employees|regex:/^[a-zA-Z0-9_.]+$/',
            "phone" => "required",
            "phoneTwo" => "required",
            "address" => "required",
            "district" => "required",
            "city" => "required",
            "role" => "required",
            "salary" => "required",
            "dateOfJoin" => "required",
        ],[
            "name.required" => "حقل الإسم مطلوب",
            'username.required' => 'إسم المستخدم مطلوب',
            'username.unique' => 'إسم المستخدم موجود من قبل',
            'username.regex' => 'إسم المستخدم بالإنجليزية فقط بدون مسافات',
            "phone.required" => "رقم التليفون مطلوب",
            "phoneTwo.required" => "رقم تليفون أخر مطلوب",
            "address.required" => "العنوان مطلوب",
            "district.required" => "الحى مطلوب",
            "city.required" => "المدينة مطلوب",
            "role.required" => "الوظيفة/صلاحية مطلوبة",
            "salary.required" => "الراتب مطلوب",
            "dateOfJoin.required" => "تاريخ التعيين مطلوب",

        ]);

        $query =  Employee::create($request->all());

        if ($query) {
            session()->flash('message',"تم إضافة الموظف بنجاح");
            return redirect()->back();
        }  else {

            session()->flash("error","يوجد مشكلة فى إضافة الموظف");
            return redirect()->back();
        }

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
    public function edit($id)
    {

        // $this->checkEmployeeHasAccess("edit-employees");

        $employee = Employee::findOrFail($id);

        $roles = Role::distinct()->pluck("role")->toArray();

        return view("users.update" , ["Data"=> $employee, "roles" => $roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // $this->checkEmployeeHasAccess("edit-employees");

        $request->validate([
            "name" => "required",
            "phone" => "required",
            "phoneTwo" => "required",
            "address" => "required",
            "district" => "required",
            "city" => "required",
            "role" => "required",
            "salary" => "required",
            "dateOfJoin" => "required",
        ],[
            "name.required" => "حقل الإسم مطلوب",
            "phone.required" => "رقم التليفون مطلوب",
            "phoneTwo.required" => "رقم تليفون أخر مطلوب",
            "address.required" => "العنوان مطلوب",
            "district.required" => "الحى مطلوب",
            "city.required" => "المدينة مطلوب",
            "role.required" => "الوظيفة/صلاحية مطلوبة",
            "salary.required" => "الراتب مطلوب",
            "dateOfJoin.required" => "تاريخ التعيين مطلوب",

        ]);

        $query =  Employee::where("id",$id)->update($request->except("_token"));

        if ($query) {
            session()->flash('message',"تم تعديل الموظف بنجاح");
            return redirect()->back();
        }  else {

            session()->flash("error","يوجد مشكلة فى تعديل الموظف");
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        // $this->checkEmployeeHasAccess("delete-employees");

        $query =  Employee::find($id);

      if ($query) {

        $query->delete();

        session()->flash("message","تم حذف الموظف بنجاح");

       return redirect()->back();

    } else {

        session()->flash("error","رقم الموظف غير موجود");

       return redirect()->back();

      }
    }
}
