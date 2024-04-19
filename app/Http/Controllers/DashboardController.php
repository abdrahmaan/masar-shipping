<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Client;
use App\Models\FinancialRequest;
use App\Models\Letter;
use App\Models\Payment;
use App\Models\Penal;
use App\Models\Terms;
use App\Models\User;
use App\Models\WarantyPoliciy;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $individualCount = Client::where("client_type","individual")->get()->count();

        $commercialCount = Client::where("client_type","commercial")->get()->count();

        $lettersCount = Letter::count();

        $financialCount = FinancialRequest::count();

        $appointmentsCount = Appointment::select("status",DB::raw("COUNT(id) as count"))->groupBy("status")->get();


        $appointmentsSaryCount = Appointment::where("status","سارى")->count("id");

        session()->put("appointment",$appointmentsSaryCount);

        $payments = Payment::select(DB::raw("dateOfPay as Date"),DB::raw("SUM(amount) as Total"))
        ->where("paymentType","debit")
        ->groupBy("dateOfPay")
        ->orderBy("dateOfPay","desc")
        ->take(7)
        ->get();

        $terms_conditions = Terms::select("contract_type",DB::raw("COUNT(id) as count"))->groupBy("contract_type")->get();

        $penals = Penal::select("contract_type",DB::raw("COUNT(id) as count"))->groupBy("contract_type")->get();

        $waranty_policiy = WarantyPoliciy::where("status","active")->count("id");

        // return dd($terms_conditions,$penals,$waranty_policiy);

        // return dd($appointment_delayed_count);

        $Data = [

            "individualCount" => $individualCount,
            "commercialCount" => $commercialCount,
            "lettersCount" => $lettersCount,
            "financialCount" => $financialCount,
            "appointmentsCount" => $appointmentsCount,
            "payments" => $payments,
            "terms_conditions" => $terms_conditions,
            "penals" => $penals,
            "waranty_policiy" => $waranty_policiy,
        ];

        return view('dashboard', ["Data" => $Data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
