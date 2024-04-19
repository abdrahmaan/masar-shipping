<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Traits\EmployeeAccess;

class CommercialController extends Controller
{

    use EmployeeAccess;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->checkEmployeeHasAccess("view-commercial-client");

        $id = $request->id;
        $fullName = $request->fullName;
        $phone = $request->phone;
        $registerNumber = $request->registerNumber;
        $perPage = $request->perPage ?? 20;




        $Clients = Client::query();

        $Clients->where("client_type","commercial");

        if (isset($id) && $id !== null) {
             $Clients->where("id",$id);
        }

        if (isset($fullName) && $fullName !== null) {

             $Clients->where('fullName', 'like', '%' . $fullName . '%')
                    ->orWhere('tradeName', 'like', '%' . $fullName . '%');

        }

        if (isset($phone) && $phone !== null) {

             $Clients->where('phone', 'like', '%' . $phone . '%')
                    ->orWhere("phoneTwo", "like", "%" . $phone . "%");
        }

        if (isset($registerNumber) && $registerNumber !== null) {

             $Clients->where('registerNumber', 'like', '%' . $registerNumber . '%');
        }

      $lastData = $Clients->where("client_type","commercial")->paginate($perPage)->withQueryString();
      return view("client.commercial.view" ,[ "Data"=> $lastData] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->checkEmployeeHasAccess("create-commercial-client");

        return view("client.commercial.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->checkEmployeeHasAccess("create-commercial-client");


        $request["client_type"] = 'commercial';

        $request->validate([
            "tradeName" => "required",
            "fullName" => "required",
            "gender" => "required",
            "taxNumber" => "required",
            "registerNumber" => "required",
            "phone" => "required",
            "phoneTwo" => "required",
            "email" => "required",
            "address" => "required",
            "district" => "required",
            "city" => "required",
            "postalCode" => "required",
        ],[
            "tradeName.required" => "الإسم التجارى مطلوب",
            "fullName.required" => "الإسم الثلاثى مطلوب",
            "gender.required" => "الجنس مطلوب",
            "taxNumber.required" => "الرقم الضريبي مطلوب",
            "registerNumber.required" => "رقم السجل التجارى مطلوب",
            "phone.required" => "رقم التليفون مطلوب",
            "phoneTwo.required" => "رقم تليفون أخر مطلوب",
            "email.required" => "البريد الإلكترونى مطلوب",
            "address.required" => "العنوان مطلوب",
            "district.required" => "الحى مطلوب",
            "city.required" => "المدينة مطلوبة",
            "postalCode.required" => "الرمز البريدي مطلوب",
        ]);

        $insert =  Client::create($request->all());

       if ($insert) {

            session()->flash("message","تم إضافة العميل بنجاح");
            return redirect()->back();

        } else {

            session()->flash("error","يوجد مشكلة فى إضافة العميل");
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

        $this->checkEmployeeHasAccess("view-commercial-client");

        $client = Client::findOrFail( $id);

         // Appointmens
         $client->appointments;

         // Letters
         $client->letters;

         // Financial_Requests
         $client->financial_requests;

         // Payments
         $client->payments;

        $debitAmount = $client->payments()->where("paymentType","debit")->sum("amount");
        $creditAmount = $client->payments()->where("paymentType","credit")->sum("amount");
        $balance = $debitAmount - $creditAmount;

       // return dd($client);


        return view("client.profile", ["Data" => $client, "balance" => $balance]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->checkEmployeeHasAccess("edit-commercial-client");


        $client = Client::findOrFail( $id);

        return view("client.commercial.update", ["Data" => $client]);
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

        $this->checkEmployeeHasAccess("edit-commercial-client");

        $request["client_type"] = 'commercial';

        $request->validate([
            "tradeName" => "required",
            "fullName" => "required",
            "gender" => "required",
            "taxNumber" => "required",
            "registerNumber" => "required",
            "phone" => "required",
            "phoneTwo" => "required",
            "email" => "required",
            "address" => "required",
            "district" => "required",
            "city" => "required",
            "postalCode" => "required",
        ],[
            "tradeName.required" => "الإسم التجارى مطلوب",
            "fullName.required" => "الإسم الثلاثى مطلوب",
            "gender.required" => "الجنس مطلوب",
            "taxNumber.required" => "الرقم الضريبي مطلوب",
            "registerNumber.required" => "رقم السجل التجارى مطلوب",
            "phone.required" => "رقم التليفون مطلوب",
            "phoneTwo.required" => "رقم تليفون أخر مطلوب",
            "email.required" => "البريد الإلكترونى مطلوب",
            "address.required" => "العنوان مطلوب",
            "district.required" => "الحى مطلوب",
            "city.required" => "المدينة مطلوبة",
            "postalCode.required" => "الرمز البريدي مطلوب",
        ]);

        $update =  Client::where("id",$id)->update($request->except(["_token"]));

       if ($update) {

            session()->flash("message","تم تعديل العميل بنجاح");
            return redirect()->back();

        } else {

            session()->flash("error","يوجد مشكلة فى إضافة العميل");
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

        $this->checkEmployeeHasAccess("delete-commercial-client");

        $client = Client::where("id",$id)->delete();

        if ($client) {

            session()->flash("message","تم حذف العميل بنجاح");
            return redirect()->back();

        } else {

            session()->flash("error","يوجد مشكلة فى حذف العميل");
            return redirect()->back();

        }
    }
}
