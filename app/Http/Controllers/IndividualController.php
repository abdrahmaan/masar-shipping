<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Traits\EmployeeAccess;

class IndividualController extends Controller
{

    use EmployeeAccess;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $this->checkEmployeeHasAccess("view-individual-client");

        $id = $request->id;
        $fullName = $request->fullName;
        $phone = $request->phone;
        $national_id = $request->national_id;
        $perPage = $request->perPage ?? 20;



        $Clients = Client::query();


        if (isset($id) && $id !== null) {
             $Clients->where("id",$id);
        }

        if (isset($fullName) && $fullName !== null) {

             $Clients->where('fullName', 'like', '%' . $fullName . '%');
        }

        if (isset($phone) && $phone !== null) {

             $Clients->where('phone', 'like', '%' . $phone . '%')
                    ->orWhere("phoneTwo", "like", "%" . $phone . "%");
        }

        if (isset($national_id) && $national_id !== null) {

             $Clients->where('national_id', 'like', '%' . $national_id . '%');
        }



      $lastData = $Clients->where("client_type","individual")->paginate($perPage)->withQueryString();

      return view("client.individual.view" ,[ "Data"=> $lastData] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->checkEmployeeHasAccess("create-individual-client");

        return view("client.individual.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->checkEmployeeHasAccess("create-individual-client");


        $request["client_type"] = 'individual';

        $request->validate([
            "fullName" => "required",
            "gender" => "required",
            "phone" => "required",
            "phoneTwo" => "required",
            "address" => "required",
            "email" => "required",
            "district" => "required",
            "city" => "required",
            "postalCode" => "required",
            "dateOfBirth" => "required",
        ],[
            "fullName.required" => "الإسم الثلاثى مطلوب",
            "gender.required" => "الجنس مطلوب",
            "phone.required" => "رقم التليفون مطلوب",
            "phoneTwo.required" => "رقم تليفون أخر مطلوب",
            "address.required" => "العنوان مطلوب",
            "email.required" => "من فضلك البريد الإلكترونى مطلوب",
            "district.required" => "الحى مطلوب",
            "city.required" => "المدينة مطلوبة",
            "postalCode.required" => "الرمز البريدي مطلوب",
            "dateOfBirth.required" => "تاريخ الميلاد مطلوب",
        ]);

       $insert =  Client::create($request->all());

       if ($insert) {

            session()->flash("message","تم إضافة العميل بنجاح");
            return redirect()->back();

        } else {

            session()->flash("error","يوجد مشكلة فى إضافة العميل");
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

        $this->checkEmployeeHasAccess("view-individual-client");


        $client = Client::findOrFail($id);

        // Appointmens
        $client->appointments;

        // Letters
        $client->letters;

        // Financial_Requests
        $client->financial_requests;

        // Payments
        $client->payments;

        // Calculate Client Balance (Debit - Credit = Balance)
        $debitAmount = $client->payments()->where("paymentType","debit")->sum("amount");
        $creditAmount = $client->payments()->where("paymentType","credit")->sum("amount");
        $balance = $debitAmount - $creditAmount;


        return view("client.profile", ["Data" => $client , "balance" => $balance]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $this->checkEmployeeHasAccess("edit-individual-client");

        $client = Client::findOrFail($id);

        return view("client.individual.update" , ["Data" => $client]);
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

        $this->checkEmployeeHasAccess("edit-individual-client");

        $request["client_type"] = 'individual';

        $request->validate([
            "fullName" => "required",
            "gender" => "required",
            "phone" => "required",
            "phoneTwo" => "required",
            "address" => "required",
            "email" => "required",
            "district" => "required",
            "city" => "required",
            "postalCode" => "required",
            "dateOfBirth" => "required",
        ],[
            "fullName.required" => "الإسم الثلاثى مطلوب",
            "gender.required" => "الجنس مطلوب",
            "phone.required" => "رقم التليفون مطلوب",
            "phoneTwo.required" => "رقم تليفون أخر مطلوب",
            "address.required" => "العنوان مطلوب",
            "email.required" => "من فضلك البريد الإلكترونى مطلوب",
            "district.required" => "الحى مطلوب",
            "city.required" => "المدينة مطلوبة",
            "postalCode.required" => "الرمز البريدي مطلوب",
            "dateOfBirth.required" => "تاريخ الميلاد مطلوب",
        ]);

       $update =  Client::where("id",$id)->update($request->except(['_token']));


       if ($update) {

            session()->flash("message","تم تعديل العميل بنجاح");
            return redirect()->back();

        } else {

            session()->flash("error","يوجد مشكلة فى تعديل العميل");
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

        $this->checkEmployeeHasAccess("delete-individual-client");

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
