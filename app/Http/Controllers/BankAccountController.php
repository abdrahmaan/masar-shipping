<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use App\Traits\EmployeeAccess;
use Illuminate\Http\Request;

class BankAccountController extends Controller
{

    use EmployeeAccess;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $this->checkEmployeeHasAccess("view-bank-account");

        $Data = BankAccount::where("default",1)->get()->first();

        return view("setting.bankAccount.create" , ["Data"=>$Data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->checkEmployeeHasAccess("edit-bank-account");

        $request->validate([
            "companyName" => "required",
            "bankName" => "required",
            "accNumber" => "required|string|min:14|max:14",
            "iban"=> "required|min:24|max:24",
        ],[
            "companyName.required" => "إسم الشركة مطلوب",
            "bankName.required" => "إسم البنك مطلوب",
            "accNumbe.requiredr" => "رقم الحساب مطلوب",
            "accNumber.numeric" => "رقم الحساب بالأرقام فقط",
            "accNumber.min" => "رقم الحساب مكون من 14 رقم",
            "accNumber.max" => "رقم الحساب مكون من 14 رقم",
            "iban.required"=> "رقم الـ IBAN مطلوب",
            "iban>min"=> "رقم الـ IBAN مكون من 24 حرف",
            "iban>max"=> "رقم الـ IBAN مكون من 24 حرف",

        ]);

      $update =  BankAccount::updateOrCreate(["default"=>1],
        [
            "default"  => 1,
            "companyName"  => $request->companyName,
            "bankName"  => $request->bankName,
            "accNumber"  => $request->accNumber,
            "iban" => $request->iban,
        ]
        );

        if ($update) {

            session()->flash("message","تم تعديل الحساب بنجاح");
            return redirect()->back();

        } else {

            session()->flash("error","يوجد مشكلة فى تعديل الحساب");
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
        //
    }
}
