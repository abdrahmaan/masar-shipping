<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Payment;
use App\Traits\EmployeeAccess;

class PaymentController extends Controller
{

    use EmployeeAccess;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $this->checkEmployeeHasAccess("view-payments");

        $client_id = $request->id;
        $clientName = $request->clientName;
        $contract_id = $request->contract_id;
        $sDate = $request->sDate;
        $eDate = $request->eDate;
        $paymentType = $request->paymentType;
        $transactionType = $request->transactionType;
        $perPage = $request->perPage ?? 20;




        $Payments = Payment::query();



        if (isset($client_id) && $client_id !== null) {
             $Payments->where("client_id",$client_id);
        }

        if (isset($clientName) && $clientName !== null) {

             $Payments->where('clientName', 'like', '%' . $clientName . '%');
        }

        if (isset($contract_id) && $contract_id !== null) {
             $Payments->where("contract_id",$contract_id);
        }


        if (isset($sDate) && $sDate !== null) {

             $Payments->whereDate('dateOfPay', '>=', $sDate);
        }

        if (isset($eDate) && $eDate !== null) {

             $Payments->whereDate('dateOfPay', '<=', $eDate);

        }

        if (isset($paymentType) && $paymentType !== null && $paymentType !== "الكل") {
            $Payments->where("paymentType",$paymentType);
       }

        if (isset($transactionType) && $transactionType !== null && $transactionType !== "الكل") {
            $Payments->where("transactionType",$transactionType);
       }


       $debitAmount =  Payment::where("paymentType","debit")->sum("amount");
       $creditAmount = Payment::where("paymentType","credit")->sum("amount");
       $balance = $debitAmount - $creditAmount;

      $lastData = $Payments->paginate($perPage)->withQueryString();

        return view("payment.view" ,["Data" => $lastData , "balance" =>$balance ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id)
    {

        $this->checkEmployeeHasAccess("create-payment");


        $client = Client::findOrFail($id);


        return view("payment.create",["Data"=>$client]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->checkEmployeeHasAccess("create-payment");


        $request->validate([
            "clientName" => "required",
            "client_id" => "required|numeric",
            "contract_id" => "required|numeric",
            "paymentType" => "required",
            "transactionType" => "required",
            "amount" => "required|numeric",
            "dateOfPay"=> "required",
        ],[
            "clientName.required" => "إسم العميل مطلوب",
            "client_id.required" => "رقم العميل مطلوب",
            "client_id.numeric" => "رقم العميل بالأرقام",
            "contract_id.required" => "رقم العقد مطلوب",
            "contract_id.numeric" => "رقم العقد بالأرقام فقط",
            "paymentType.required" => "نوع القيد مطلوب",
            "transactionType.required" => "نوع المعاملة مطلوب",
            "amount.required" => "المبلغ مطلوب",
            "amount.numeric" => "المبلغ مطلوب بالأرقام فقط",
            "dateOfPay.required"=> "تاريخ السداد مطلوب",
        ]);

        $request["op"] = session()->get("user-data")->name;

       if ($request["description"] == null) {
        $request["description"] = "لا يوجد";
       }

        $insert = Payment::create($request->all());

        if ($insert) {

            session()->flash("message","تم إضافة دفعة مالية بنجاح");
            return redirect()->back();

        } else {

            session()->flash("error","يوجد مشكلة فى إضافة دفعة مالية للعميل");
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

        $this->checkEmployeeHasAccess("delete-payments");

        $payment = Payment::where("id",$id)->delete();

        if ($payment) {

            session()->flash("message","تم حذف الدفعة بنجاح");
            return redirect()->back();

        } else {

            session()->flash("error","يوجد مشكلة فى حذف الدفعة");
            return redirect()->back();

        }
    }
}
