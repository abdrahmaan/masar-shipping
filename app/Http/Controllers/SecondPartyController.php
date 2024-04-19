<?php

namespace App\Http\Controllers;

use App\Models\SecondParty;
use App\Traits\EmployeeAccess;
use Illuminate\Http\Request;

class SecondPartyController extends Controller
{

        use  EmployeeAccess;

    public function triggerStatus(Request $request){

        $this->checkEmployeeHasAccess("trigger-second-party-status");

        $id = $request->id;

        $secondParty = SecondParty::findOrFail($id);

        if ($secondParty->status == "active") {

            $secondParty->status = "disabled";
            $secondParty->save();
            session()->flash("message","تم تعطيل القيمة بنجاح");

        } else {

            $secondParty->status = "active";
            $secondParty->save();
            session()->flash("message","تم تفعيل القيمة بنجاح");

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

        $this->checkEmployeeHasAccess("view-second-party");
        $type = $request->type;
        $status = $request->status;

        $perPage = $request->perPage ?? 20;




        $secondParty = SecondParty::query();


        if (isset($type) && $type !== null && $type !== "الكل") {
             $secondParty->where("type",$type);
        }

        if (isset($status) && $status !== null && $status !== "الكل") {

             $secondParty->where('status', $status);

        }


      $lastData = $secondParty->paginate($perPage)->withQueryString();

      return view("setting.second-party.view" ,[ "Data"=> $lastData] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $this->checkEmployeeHasAccess("create-second-party");

        return view("setting.second-party.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->checkEmployeeHasAccess("create-second-party");

        $request->validate([
            "type"=> "required",
            "value"=> "required",
        ],[
            "type.required"=> "نوع واجبات الطرف الثانى مطلوب",
            "value.required"=> "المواصفات مطلوبة",
        ]);

        $insert = SecondParty::create($request->all());

        if ($insert) {

            session()->flash("message","تم إضافة واجبات الطرف بنجاح");
            return redirect()->back();

        } else {

            session()->flash("error","يوجد مشكلة فى إضافة واجبات الطرف");
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

        $this->checkEmployeeHasAccess("delete-second-party");

        $secondParty = SecondParty::where("id",$id)->delete();

        if ($secondParty) {

            session()->flash("message","تم حذف المطلوب بنجاح");
            return redirect()->back();

        } else {

            session()->flash("error","يوجد مشكلة فى حذف المطلوب");
            return redirect()->back();

        }
    }
}
