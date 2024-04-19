<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Letter;
use Mail;
use App\Mail\LetterMail;
use App\Mail\ClientMail;
use App\Traits\EmployeeAccess;

class LetterController extends Controller
{

    use EmployeeAccess;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->checkEmployeeHasAccess("view-letters");


        $id = $request->id;
        $fullName = $request->fullName;
        $phone = $request->phone;
        $perPage = $request->perPage ?? 20;




        $Letters = Letter::query();



        if (isset($id) && $id !== null) {
             $Letters->where("client_id",$id);
        }

        if (isset($fullName) && $fullName !== null) {

             $Letters->where('fullName', 'like', '%' . $fullName . '%');
        }

        if (isset($phone) && $phone !== null) {

             $Letters->where('phone', 'like', '%' . $phone . '%');
        }


      $lastData = $Letters->paginate($perPage)->withQueryString();

        return view("letter.view" ,["Data" => $lastData]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $this->checkEmployeeHasAccess("create-letter");

        $client_id = $request->id;

        $client = Client::findOrFail($client_id);

        return view("letter.create",["Data" =>$client]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->checkEmployeeHasAccess("create-letter");


        $request->validate([
            "client_id" => "required",
            "letter_description" => "required",

        ],[
            "client_id.required" => "رقم ملف العميل مطلوب",
            "letter_description.required" => "بيانات الخطاب مطلوب",
        ]);


        $message_data = [
            "title" => "خطاب رسمى",
            "name" => $request->fullName,
            "message" => $request->letter_description,
        ];

        $client_email = Client::where("id",$request->client_id)->get()->first()->email;

       $email = Mail::to($client_email)->send(new ClientMail($message_data));

        if ($email) {
            $request["op"] = session()->get("user-data")["name"];

            $insert = Letter::create($request->all());

            if ($insert) {

                session()->flash("message","تم إرسال الخطاب بنجاح");
                return redirect()->back();

            } else {

                session()->flash("error","يوجد مشكلة فى إرسال الخطاب للعميل");
                return redirect()->back();

            }

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
