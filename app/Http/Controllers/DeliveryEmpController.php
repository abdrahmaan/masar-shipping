<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Delivery;
use App\Models\Employee;
use App\Traits\EmployeeAccess;
use Carbon\Carbon;

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

        // $this->checkEmployeeHasAccess("view-individual-Del$Delviery");

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
       // $this->checkEmployeeHasAccess("create-individual-Del$Delviery");

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

        // $this->checkEmployeeHasAccess("create-individual-Del$Delviery");



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


      $insertEmp = Employee::create([
        "name" => $request->fullName,
        "username" => $request->username,
        "password" => "123456",
        "phone" => $request->phone,
        "phoneTwo" => $request->phoneTwo,
        "address" => $request->address,
        "district" => $request->district,
        "city" => $request->city,
        "role" => "مندوب توصيل",
        "salary" => "0",
        "dateOfJoin" => Carbon::now(),
    ]);

       if ($insert && $insertEmp) {

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

       // $this->checkEmployeeHasAccess("view-individual-Del$Delviery");


        $Delviery = Delivery::findOrFail($id);

        // Appointmens
        $Delviery->appointments;

        // Letters
        $Delviery->letters;

        // Financial_Requests
        $Delviery->financial_requests;

        // Payments
        $Delviery->payments;

        // CalculateDelivery Balance (Debit - Credit = Balance)
        $debitAmount = $Delviery->payments()->where("paymentType","debit")->sum("amount");
        $creditAmount = $Delviery->payments()->where("paymentType","credit")->sum("amount");
        $balance = $debitAmount - $creditAmount;


        return view("Del$Delviery.profile", ["Data" => $Delviery , "balance" => $balance]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

       // $this->checkEmployeeHasAccess("edit-individual-Del$Delviery");

        $Delviery = Delivery::findOrFail($id);

        return view("delivery.update" , ["Data" => $Delviery]);
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

       // $this->checkEmployeeHasAccess("edit-individual-Del$Delviery");



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
    ]);
       $update = Delivery::where("id",$id)->update($request->except(['_token']));


       if ($update) {

            session()->flash("message","تم تعديل المندوب بنجاح");
            return redirect()->back();

        } else {

            session()->flash("error","يوجد مشكلة فى تعديل المندوب");
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

     //   $this->checkEmployeeHasAccess("delete-individual-Del$Delviery");

        $Delviery = Delivery::where("id",$id)->delete();

        if ($Delviery) {

            session()->flash("message","تم حذف المندوب بنجاح");
            return redirect()->back();

        } else {

            session()->flash("error","يوجد مشكلة فى حذف المندوب");
            return redirect()->back();

        }
    }
}
