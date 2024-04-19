<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Appointment;
use Mail;
use App\Mail\LetterMail;
use App\Traits\EmployeeAccess;

class AppointmentController extends Controller
{

    use EmployeeAccess;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $this->checkEmployeeHasAccess("view-appointment");


        $id = $request->id;
        $fullName = $request->fullName;
        $phone = $request->phone;
        $status = $request->status;
        $sDate = $request->sDate;
        $eDate = $request->eDate;
        $perPage = $request->perPage ?? 20;




        $Appointments_count = Appointment::where("status","سارى")->count("id");

        session()->put("appointment",$Appointments_count);

        $Appointments = Appointment::query();



        if (isset($id) && $id !== null) {
             $Appointments->where("client_id",$id);
        }

        if (isset($fullName) && $fullName !== null) {

             $Appointments->where('fullName', 'like', '%' . $fullName . '%');
        }

        if (isset($phone) && $phone !== null) {

             $Appointments->where('phone', 'like', '%' . $phone . '%')
                    ->orWhere("phoneTwo", "like", "%" . $phone . "%");
        }

        if (isset($status) && $status !== null && $status !== "الكل") {

             $Appointments->where('status',  $status );
        }

        if (isset($sDate) && isset($eDate) && $sDate !== null && $eDate !== null) {

             $Appointments->whereDate('dateOfAppointment', '>=', $sDate)
             ->whereDate('dateOfAppointment', '<=', $eDate);
        }

      $lastData = $Appointments->paginate($perPage)->withQueryString();

      return view("appointment.view" ,["Data" => $lastData]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $this->checkEmployeeHasAccess("create-appointment");


        $client_id = $request->id;

        $client = Client::findOrFail($client_id);

        $Appointments_count = Appointment::where("status","سارى")->count("id");

        session()->put("appointment",$Appointments_count);

        return view("appointment.create" ,["Data" => $client]);
    }


    public function email() {
        return view("emails.letter");
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->checkEmployeeHasAccess("create-appointment");


        $request->validate([
            "client_id" => "required",
            "fullName" => "required",
            "phone" => "required",
            "phoneTwo" => "required",
            "address" => "required",
            "district" => "required",
            "city" => "required",
            "dateOfAppointment" => "required",
            "dayOfAppointment" => "required",
            "timeOfAppointment" => "required",
            "reason" => "required",

        ],[
            "client_id.required" => "رقم ملف العميل مطلوب",
            "fullName.required" => "إسم العميل الثلاثى مطلوب",
            "phone.required" => "رقم التليفون مطلوب",
            "phoneTwo.required" => "رقم تليفون أخر مطلوب",
            "address.required" => "العنوان مطلوب",
            "district.required" => "الحى مطلوب",
            "city.required" => "المدينة مطلوبة",
            "dateOfAppointment.required" => "تاريخ الموعد مطلوب",
            "dayOfAppointment.required" => "يوم الموعد مطلوب",
            "timeOfAppointment.required" => "ساعة الموعد مطلوبة",
            "reason.required" => "سبب الموعد مطلوب",
        ]);



        $request["op"] = session()->get("user-data")["name"];

        $insert = Appointment::create($request->all());


        if ($insert) {

            session()->flash("message","تم إضافة الموعد بنجاح");
            return redirect()->back();

        } else {

            session()->flash("error","يوجد مشكلة فى إضافة الموعد للعميل");
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

        $this->checkEmployeeHasAccess("edit-appointment");


        $appointment = Appointment::findOrFail($id);



        return view("appointment.edit" , ["Data" => $appointment]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $this->checkEmployeeHasAccess("edit-appointment");


        $request->validate([
            "id" => "required",
            "dateOfAppointment" => "required",
            "dayOfAppointment" => "required",
            "timeOfAppointment" => "required",
            "status" => "required",
            "op_description" => "required",

        ],[
            "id.required" => "رقم ملف العميل مطلوب",
            "dateOfAppointment.required" => "تاريخ الموعد مطلوب",
            "dayOfAppointment.required" => "يوم الموعد مطلوب",
            "timeOfAppointment.required" => "ساعة الموعد مطلوبة",
            "status.required" => "حالة الموعد مطلوبة",
            "op_description.required" => "ملاحظات على الموعد مطلوبة",
        ]);

        $update = Appointment::where("id",$request->id)->update([
            "dateOfAppointment" => $request->dateOfAppointment,
            "dayOfAppointment" => $request->dayOfAppointment,
            "timeOfAppointment" => $request->timeOfAppointment,
            "status" => $request->status,
            "op" => session()->get("user-data")->name,
            "op_description" => $request->op_description,
        ]);


        if ($update) {

            session()->flash("message","تم تعديل الموعد بنجاح");
            return redirect("/appointments");


        } else {

            session()->flash("error","يوجد مشكلة فى تعديل الموعد للعميل");
            return redirect("/appointments");

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
        //
    }
}
