<?php

namespace App\Http\Controllers;

use App\Models\WarantyPoliciy;
use App\Traits\EmployeeAccess;
use Illuminate\Http\Request;

class WarantyController extends Controller
{
    use EmployeeAccess;

    public function triggerStatus(Request $request)
    {

        $this->checkEmployeeHasAccess("trigger-waranty-status");

        $id = $request->id;

        $term = WarantyPoliciy::findOrFail($id);

        if ($term->status == 'active') {
            $term->status = 'disabled';
            $term->save();
            session()->flash('message', 'تم تعطيل سياسة الضمان بنجاح');
        } else {
            $term->status = 'active';
            $term->save();
            session()->flash('message', 'تم تفعيل ساسية الضمان بنجاح');
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

        $this->checkEmployeeHasAccess("view-waranty");

        $status = $request->status;

        $perPage = $request->perPage ?? 20;

        $Waranty = WarantyPoliciy::query();

        if (isset($status) && $status !== null && $status !== 'الكل') {
            $Waranty->where('status', $status);
        }

        $lastData = $Waranty->paginate($perPage)->withQueryString();

        return view('setting.waranty.view', ['Data' => $lastData]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $this->checkEmployeeHasAccess("create-waranty");

        return view('setting.waranty.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->checkEmployeeHasAccess("create-waranty");

        $request->validate(
            [
                'policiy' => 'required',
            ],
            [
                'policiy.required' => 'بند سياسة الضمان مطلوب',
            ],
        );

        $insert = WarantyPoliciy::create($request->all());

        if ($insert) {
            session()->flash('message', 'تم إضافة سباسية الضمان بنجاح');
            return redirect()->back();
        } else {
            session()->flash('error', 'يوجد مشكلة فى إضافة سياسة الضمان');
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

        $this->checkEmployeeHasAccess("delete-waranty");

        $Waranty = WarantyPoliciy::where('id', $id)->delete();

        if ($Waranty) {
            session()->flash('message', 'تم حذف سياسة الضمان بنجاح');
            return redirect()->back();
        } else {
            session()->flash('error', 'يوجد مشكلة فى حذف سياسة الضمان');
            return redirect()->back();
        }
    }
}
