<?php

namespace App\Http\Controllers;

use App\Models\Penal;
use App\Traits\EmployeeAccess;
use Illuminate\Http\Request;

class PenalController extends Controller
{

        use EmployeeAccess;

    public function triggerStatus(Request $request){

        $this->checkEmployeeHasAccess("trigger-penal-status");

        $id = $request->id;

        $penal = Penal::findOrFail($id);

        if ($penal->status == "active") {

            $penal->status = "disabled";
            $penal->save();
            session()->flash("message","تم تعطيل الشرط بنجاح");

        } else {

            $penal->status = "active";
            $penal->save();
            session()->flash("message","تم تفعيل الشرط بنجاح");

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

        $this->checkEmployeeHasAccess("view-penal");

        $contract_type = $request->contract_type;
        $status = $request->status;

        $perPage = $request->perPage ?? 20;




        $Penal = Penal::query();


        if (isset($contract_type) && $contract_type !== null && $contract_type !== "الكل") {
             $Penal->where("contract_type",$contract_type);
        }

        if (isset($status) && $status !== null && $status !== "الكل") {

             $Penal->where('status', $status);

        }


      $lastData = $Penal->paginate($perPage)->withQueryString();

      return view("setting.penal.view" ,[ "Data"=> $lastData] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $this->checkEmployeeHasAccess("create-penal");

        return view("setting.penal.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->checkEmployeeHasAccess("create-penal");

        $request->validate([
            "penal"=> "required",
            "contract_type"=> "required",
        ],[
            "term.required"=> "بند الأحكام الجزائية مطلوب",
            "contract_type.required"=> "نوع المستند مطلوب",
        ]);

        $insert = Penal::create($request->all());

        if ($insert) {

            session()->flash("message","تم إضافة الحكم بنجاح");
            return redirect()->back();

        } else {

            session()->flash("error","يوجد مشكلة فى إضافة الحكم");
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

        $this->checkEmployeeHasAccess("delete-penal");

        $penal = Penal::where("id",$id)->delete();

        if ($penal) {

            session()->flash("message","تم حذف الحكم بنجاح");
            return redirect()->back();

        } else {

            session()->flash("error","يوجد مشكلة فى حذف الحكم");
            return redirect()->back();

        }
    }
}
