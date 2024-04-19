<?php

namespace App\Http\Controllers;

use App\Models\ElevatorSpecifications;
use App\Traits\EmployeeAccess;
use Illuminate\Http\Request;

class ElevatorSpecificationsController extends Controller
{


    use EmployeeAccess;

    public function triggerStatus(Request $request){

        $this->checkEmployeeHasAccess("trigger-elevator-specs-status");

        $id = $request->id;

        $elevatorSpecs = ElevatorSpecifications::findOrFail($id);

        if ($elevatorSpecs->status == "active") {

            $elevatorSpecs->status = "disabled";
            $elevatorSpecs->save();
            session()->flash("message","تم تعطيل المواصفات بنجاح");

        } else {

            $elevatorSpecs->status = "active";
            $elevatorSpecs->save();
            session()->flash("message","تم تفعيل المواصفات بنجاح");

        }

        return redirect()->back();

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $this->checkEmployeeHasAccess("view-elevator-specs");
        $type = $request->type;
        $status = $request->status;

        $perPage = $request->perPage ?? 20;




        $elevaltorSpecs = ElevatorSpecifications::query();


        if (isset($type) && $type !== null && $type !== "الكل") {
             $elevaltorSpecs->where("type",$type);
        }

        if (isset($status) && $status !== null && $status !== "الكل") {

             $elevaltorSpecs->where('status', $status);

        }


      $lastData = $elevaltorSpecs->paginate($perPage)->withQueryString();

      return view("setting.elevator-specs.view" ,[ "Data"=> $lastData] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->checkEmployeeHasAccess("create-elevator-specs");

        return view("setting.elevator-specs.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->checkEmployeeHasAccess("create-elevator-specs");

        $request->validate([
            "type"=> "required",
            "value"=> "required",
        ],[
            "type.required"=> "نوع مواصفات المصعد مطلوب",
            "value.required"=> "المواصفات مطلوبة",
        ]);

        $insert = ElevatorSpecifications::create($request->all());

        if ($insert) {

            session()->flash("message","تم إضافة الموصفات بنجاح");
            return redirect()->back();

        } else {

            session()->flash("error","يوجد مشكلة فى إضافة المواصفات");
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $this->checkEmployeeHasAccess("delete-elevator-specs");

        $elevatorSpecs = ElevatorSpecifications::where("id",$id)->delete();

        if ($elevatorSpecs) {

            session()->flash("message","تم حذف المواصفات بنجاح");
            return redirect()->back();

        } else {

            session()->flash("error","يوجد مشكلة فى حذف المواصفات");
            return redirect()->back();

        }
    }
}
