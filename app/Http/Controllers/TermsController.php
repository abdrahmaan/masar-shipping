<?php

namespace App\Http\Controllers;

use App\Models\Terms;
use App\Traits\EmployeeAccess;
use Illuminate\Http\Request;

class TermsController extends Controller
{


    use EmployeeAccess;

    public function triggerStatus(Request $request){

        $this->checkEmployeeHasAccess("trigger-term-status");

        $id = $request->id;

        $term = Terms::findOrFail($id);

        if ($term->status == "active") {

            $term->status = "disabled";
            $term->save();
            session()->flash("message","تم تعطيل الشرط بنجاح");

        } else {

            $term->status = "active";
            $term->save();
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

        $this->checkEmployeeHasAccess("view-term");

        $contract_type = $request->contract_type;
        $status = $request->status;

        $perPage = $request->perPage ?? 20;




        $Terms = Terms::query();


        if (isset($contract_type) && $contract_type !== null && $contract_type !== "الكل") {
             $Terms->where("contract_type",$contract_type);
        }

        if (isset($status) && $status !== null && $status !== "الكل") {

             $Terms->where('status', $status);

        }


      $lastData = $Terms->paginate($perPage)->withQueryString();

      return view("setting.terms.view" ,[ "Data"=> $lastData] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $this->checkEmployeeHasAccess("create-term");

        return view("setting.terms.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->checkEmployeeHasAccess("create-term");


        $request->validate([
            "term"=> "required",
            "contract_type"=> "required",
        ],[
            "term.required"=> "الشرط أو الحكم مطلوب",
            "contract_type.required"=> "نوع المستند مطلوب",
        ]);

        $insert = Terms::create($request->all());

        if ($insert) {

            session()->flash("message","تم إضافة شروط وأحكام بنجاح");
            return redirect()->back();

        } else {

            session()->flash("error","يوجد مشكلة فى إضافة شروط وأحكام");
            return redirect()->back();
        }

        return dd($request);
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

        $this->checkEmployeeHasAccess("delete-term");

        $term = Terms::where("id",$id)->delete();

        if ($term) {

            session()->flash("message","تم حذف الشرط والحكم بنجاح");
            return redirect()->back();

        } else {

            session()->flash("error","يوجد مشكلة فى حذف الشرط والحكم");
            return redirect()->back();

        }
    }
}
