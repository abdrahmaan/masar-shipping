<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DelDelivery;
use App\Models\Delivery;
use App\Traits\EmployeeAccess;

class DeliveryEmpController extends Controller
{

    use EmployeeAccess;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // $this->checkEmployeeHasAccess("view-individual-DelDelivery");

        $id = $request->id;
        $fullName = $request->fullName;
        $phone = $request->phone;
        $national_id = $request->national_id;
        $perPage = $request->perPage ?? 20;



        $Delviery = Delivery::query();


        if (isset($id) && $id !== null) {
             $Delviery->where("id",$id);
        }

        if (isset($fullName) && $fullName !== null) {

             $Delviery->where('fullName', 'like', '%' . $fullName . '%');
        }

        if (isset($phone) && $phone !== null) {

             $Delviery->where('phone', 'like', '%' . $phone . '%')
                    ->orWhere("phoneTwo", "like", "%" . $phone . "%");
        }

        if (isset($national_id) && $national_id !== null) {

             $Delviery->where('national_id', 'like', '%' . $national_id . '%');
        }



      $lastData = $Delviery->paginate($perPage)->withQueryString();

      return view("delivery.view" ,[ "Data"=> $lastData] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // $this->checkEmployeeHasAccess("create-individual-DelDelivery");

        return view("delivery.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $this->checkEmployeeHasAccess("create-individual-DelDelivery");



        $request->validate([
            "fullName" => "required",
            "gender" => "required",
            "phone" => "required",
            "phoneTwo" => "required",
            "address" => "required",
            "email" => "required",
            "district" => "required",
            "city" => "required",
            "dateOfBirth" => "required",
            "national_id" => "required",
            "commission" => "required",
            "username" => "required|unique:employees,username",
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
            "national_id.required" => "رقم الهوية مطلوب",
            "commission.required" => "العمولة مطلوبة",
            "username.required" => "إسم المستخدم مطلوب",
            "username.unique" => "إسم المستخدم موجود من قبل",
        ]);

       $insert =  Delivery::create($request->all());

       if ($insert) {

            session()->flash("message","تم إضافة المندوب بنجاح");
            return redirect()->back();

        } else {

            session()->flash("error","يوجد مشكلة فى إضافة المندوب");
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

        $this->checkEmployeeHasAccess("view-individual-DelDelivery");


        $DelDelivery =Delivery::findOrFail($id);

        // Appointmens
        $DelDelivery->appointments;

        // Letters
        $DelDelivery->letters;

        // Financial_Requests
        $DelDelivery->financial_requests;

        // Payments
        $DelDelivery->payments;

        // CalculateDelivery Balance (Debit - Credit = Balance)
        $debitAmount = $DelDelivery->payments()->where("paymentType","debit")->sum("amount");
        $creditAmount = $DelDelivery->payments()->where("paymentType","credit")->sum("amount");
        $balance = $debitAmount - $creditAmount;


        return view("DelDelivery.profile", ["Data" => $DelDelivery , "balance" => $balance]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $this->checkEmployeeHasAccess("edit-individual-DelDelivery");

        $DelDelivery =Delivery::findOrFail($id);

        return view("DelDelivery.individual.update" , ["Data" => $DelDelivery]);
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

        $this->checkEmployeeHasAccess("edit-individual-DelDelivery");

        $request["DelDelivery_type"] = 'individual';

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

       $update = Delivery::where("id",$id)->update($request->except(['_token']));


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

        $this->checkEmployeeHasAccess("delete-individual-DelDelivery");

        $DelDelivery =Delivery::where("id",$id)->delete();

        if ($DelDelivery) {

            session()->flash("message","تم حذف العميل بنجاح");
            return redirect()->back();

        } else {

            session()->flash("error","يوجد مشكلة فى حذف العميل");
            return redirect()->back();

        }
    }
}
