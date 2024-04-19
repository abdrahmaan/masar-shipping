@extends('layout.master')
@section('title',"إضافة صلاحية جديدة")


@section('content')

<div>
    <h4 class="mb-4">إضافة صلاحية جديدة</h4>
</div>

<div class="row">


    <div class="col-12">
        <form id="new-car" action="/new-role" method="POST">
            @csrf

            <!-- بيانات العميل -->
            <div class="card my-3">
                <div class="card-header d-flex align-items-center">
                    <h3  class="card-title m-0">بيانات صلاحية جديدة</h3 class="text-primary">
                    <div class="card-tools mx-3">
                        <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#car-dim" aria-expanded="true" aria-controls="car-dim">
                            <i data-feather="plus"></i>
                        </button>
                    </div>
                </div>
                <div class="collapse show" id="car-dim">
                    <div class="card-body">
                        <div class="row justify-content-start align-items-center">

                            {{-- إسم الصلاحية --}}
                        <div class="col-6 form-group my-3">

                            <label for="roleName" class="my-1">الوظيفة/الصلاحية</label>
                            <input type="text" name="roleName" class="form-control text-right" placeholder="الوظيفة/الصلاحية">
                        </div>
                        <div class="col-6 my-3 flex-column align-items-center justify-content-center">

                            <input type="checkbox" onchange="checkAll(event)" class="text-right m-2">
                            <label for="" class="text-primary">تحديد الكل</label>
                        </div>
                        <hr class="divider mb-4 w-75 m-auto">

                        {{-- العميل الفردى --}}
                        <div id="one-role" class="col-4">
                                 {{-- العميل الفردي --}}
                            <div class="col-12 mb-3">
                                <h3 class="text-primary">العميل الفردى</h3 class="text-primary">
                            </div>

                            <!-- مشاهدة  -->
                                <div class="col-lg-12 my-2">
                                        <div class="form-group mx-2 d-flex flex-row-reverse">
                                            <h5 for="fullName" class="text-right w-100 my-1 mx-2">مشاهدة</h5>
                                            <input name="individual-1" value="view-individual-client" type="checkbox" id="exampleInputEmail1">
                                        </div>
                                </div>
                            <!-- إضافة  -->
                                <div class="col-lg-12 my-2">
                                        <div class="form-group mx-2 d-flex flex-row-reverse">
                                            <h5 for="fullName" class="text-right w-100 my-1 mx-2">إضافة</h5>
                                            <input name="individual-2" value="create-individual-client" type="checkbox" id="exampleInputEmail1">
                                        </div>
                                </div>
                            <!-- تعديل  -->
                                <div class="col-lg-12 my-2">
                                        <div class="form-group mx-2 d-flex flex-row-reverse">
                                            <h5 for="fullName" class="text-right w-100 my-1 mx-2">تعديل</h5>
                                            <input name="individual-3" value="edit-individual-client" type="checkbox" id="exampleInputEmail1">
                                        </div>
                                </div>
                            <!-- حذف  -->
                                <div class="col-lg-12 my-2">
                                        <div class="form-group mx-2 d-flex flex-row-reverse">
                                            <h5 for="fullName" class="text-right w-100 my-1 mx-2">حذف</h5>
                                            <input name="individual-4" value="delete-individual-client" type="checkbox" id="exampleInputEmail1">
                                        </div>
                                </div>
                        </div>
                        {{-- العميل التجارى --}}
                        <div id="one-role" class="col-4">
                            <div class="col-12 mb-3">
                                <h3 class="text-primary">العميل التجارى</h3 class="text-primary">
                            </div>
                            <!-- مشاهدة  -->
                                <div class="col-lg-12 my-2">
                                        <div class="form-group mx-2 d-flex flex-row-reverse">
                                            <h5 for="fullName" class="text-right w-100 my-1 mx-2">مشاهدة</h5>
                                            <input name="commercial-1" value="view-commercial-client" type="checkbox" id="exampleInputEmail1">
                                        </div>
                                </div>
                            <!-- إضافة  -->
                                <div class="col-lg-12 my-2">
                                        <div class="form-group mx-2 d-flex flex-row-reverse">
                                            <h5 for="fullName" class="text-right w-100 my-1 mx-2">إضافة</h5>
                                            <input name="commercial-2" value="create-commercial-client" type="checkbox" id="exampleInputEmail1">
                                        </div>
                                </div>
                            <!-- تعديل  -->
                                <div class="col-lg-12 my-2">
                                        <div class="form-group mx-2 d-flex flex-row-reverse">
                                            <h5 for="fullName" class="text-right w-100 my-1 mx-2">تعديل</h5>
                                            <input name="commercial-3" value="edit-commercial-client" type="checkbox" id="exampleInputEmail1">
                                        </div>
                            </div>
                            <!-- حذف  -->
                                <div class="col-lg-12 my-2">
                                        <div class="form-group mx-2 d-flex flex-row-reverse">
                                            <h5 for="fullName" class="text-right w-100 my-1 mx-2">حذف</h5>
                                            <input name="commercial-4" value="delete-commercial-client" type="checkbox" id="exampleInputEmail1">
                                        </div>
                                </div>
                        </div>
                        {{-- معاملات العملاء --}}
                        <div id="one-role" class="col-4">
                            <div class="col-12 mb-3">
                                <h3 class="text-primary">معاملات العملاء</h3 class="text-primary">
                            </div>

                            <!-- مشاهدة  -->
                                <div class="col-lg-12 my-2">
                                        <div class="form-group mx-2 d-flex flex-row-reverse">
                                            <h5 for="fullName" class="text-right w-100 my-1 mx-2">إنشاء موعد للعميل</h5>
                                            <input name="appointment-1" value="create-appointment" type="checkbox" id="exampleInputEmail1">
                                        </div>
                                </div>
                            <!-- إضافة  -->
                                <div class="col-lg-12 my-2">
                                        <div class="form-group mx-2 d-flex flex-row-reverse">
                                            <h5 for="fullName" class="text-right w-100 my-1 mx-2">إنشاء خطاب للعميل</h5>
                                            <input name="letter-2" value="create-letter" type="checkbox" id="exampleInputEmail1">
                                        </div>
                                </div>
                            <!-- تعديل  -->
                                <div class="col-lg-12 my-2">
                                        <div class="form-group mx-2 d-flex flex-row-reverse">
                                            <h5 for="fullName" class="text-right w-100 my-1 mx-2">إنشاء مطالبة مالية</h5>
                                            <input name="request-3" value="create-financial-request" type="checkbox" id="exampleInputEmail1">
                                        </div>
                                </div>
                            <!-- حذف  -->
                                <div class="col-lg-12 my-2">
                                        <div class="form-group mx-2 d-flex flex-row-reverse">
                                            <h5 for="fullName" class="text-right w-100 my-1 mx-2">إنشاء دفعة مالية</h5>
                                            <input name="payment-4" value="create-payment" type="checkbox" id="exampleInputEmail1">
                                        </div>
                                </div>
                        </div>
                        <hr class="divider my-5 w-75 m-auto">
                        {{-- المواعيد --}}
                        <div id="one-role" class="col-4">
                                 {{-- العميل الفردي --}}
                            <div class="col-12 mb-3">
                                <h3 class="text-primary">مواعيد العملاء</h3 class="text-primary">
                            </div>

                            <!-- مشاهدة  -->
                                <div class="col-lg-12 my-2">
                                        <div class="form-group mx-2 d-flex flex-row-reverse">
                                            <h5 for="fullName" class="text-right w-100 my-1 mx-2">مشاهدة</h5>
                                            <input name="appointment-single-1" value="view-appointment" type="checkbox" id="exampleInputEmail1">
                                        </div>
                                </div>

                            <!-- تعديل  -->
                                <div class="col-lg-12 my-2">
                                        <div class="form-group mx-2 d-flex flex-row-reverse">
                                            <h5 for="fullName" class="text-right w-100 my-1 mx-2">تعديل</h5>
                                            <input name="appointment-single-2" value="edit-appointment" type="checkbox" id="exampleInputEmail1">
                                        </div>
                                </div>

                        </div>
                        {{-- الخطابات --}}
                        <div id="one-role" class="col-4">
                                 {{-- العميل الفردي --}}
                            <div class="col-12 mb-3">
                                <h3 class="text-primary">خطابات العملاء</h3 class="text-primary">
                            </div>

                            <!-- مشاهدة  -->
                                <div class="col-lg-12 my-2">
                                        <div class="form-group mx-2 d-flex flex-row-reverse">
                                            <h5 for="fullName" class="text-right w-100 my-1 mx-2">مشاهدة</h5>
                                            <input name="letters-single-1" value="view-letters" type="checkbox" id="exampleInputEmail1">
                                        </div>
                                </div>

                        </div>
                        {{-- المطالبات المالية --}}
                        <div id="one-role" class="col-4">
                                 {{-- العميل الفردي --}}
                            <div class="col-12 mb-3">
                                <h3 class="text-primary">المطالبات المالية</h3 class="text-primary">
                            </div>

                            <!-- مشاهدة  -->
                                <div class="col-lg-12 my-2">
                                        <div class="form-group mx-2 d-flex flex-row-reverse">
                                            <h5 for="fullName" class="text-right w-100 my-1 mx-2">مشاهدة</h5>
                                            <input name="financial-request-single-1" value="view-financial-request" type="checkbox" id="exampleInputEmail1">
                                        </div>
                                </div>

                        </div>
                        {{-- الدفعات المالية --}}
                        <hr class="divider my-5 w-75 m-auto col-12">
                        <div id="one-role" class="col-4">
                                 {{-- العميل الفردي --}}
                            <div class="col-12 mb-3">
                                <h3 class="text-primary">الدفعات المالية</h3 class="text-primary">
                            </div>

                            <!-- مشاهدة  -->
                                <div class="col-lg-12 my-2">
                                        <div class="form-group mx-2 d-flex flex-row-reverse">
                                            <h5 for="fullName" class="text-right w-100 my-1 mx-2">مشاهدة</h5>
                                            <input name="payment-single-1" value="view-payments" type="checkbox" id="exampleInputEmail1">
                                        </div>
                                </div>
                            <!-- حذف  -->
                                <div class="col-lg-12 my-2">
                                        <div class="form-group mx-2 d-flex flex-row-reverse">
                                            <h5 for="fullName" class="text-right w-100 my-1 mx-2">حذف</h5>
                                            <input name="payment-single-4" value="delete-payments" type="checkbox" id="exampleInputEmail1">
                                        </div>
                                </div>
                        </div>


                        {{-- الموظفين --}}
                        <div id="one-role" class="col-4">
                                 {{-- العميل الفردي --}}
                            <div class="col-12 mb-3">
                                <h3 class="text-primary"> الموظفين</h3 class="text-primary">
                            </div>

                            <!-- مشاهدة  -->
                                <div class="col-lg-12 my-2">
                                        <div class="form-group mx-2 d-flex flex-row-reverse">
                                            <h5 for="fullName" class="text-right w-100 my-1 mx-2">مشاهدة</h5>
                                            <input name="employee-single-1" value="view-employees" type="checkbox" id="exampleInputEmail1">
                                        </div>
                                </div>
                            <!-- إضافة  -->
                                <div class="col-lg-12 my-2">
                                        <div class="form-group mx-2 d-flex flex-row-reverse">
                                            <h5 for="fullName" class="text-right w-100 my-1 mx-2">إضافة</h5>
                                            <input name="employee-single-2" value="create-employees" type="checkbox" id="exampleInputEmail1">
                                        </div>
                                </div>
                            <!-- تعديل  -->
                                <div class="col-lg-12 my-2">
                                        <div class="form-group mx-2 d-flex flex-row-reverse">
                                            <h5 for="fullName" class="text-right w-100 my-1 mx-2">تعديل</h5>
                                            <input name="employee-single-3" value="edit-employees" type="checkbox" id="exampleInputEmail1">
                                        </div>
                                </div>
                            <!-- تعيين كلمة السر  -->
                                <div class="col-lg-12 my-2">
                                        <div class="form-group mx-2 d-flex flex-row-reverse">
                                            <h5 for="fullName" class="text-right w-100 my-1 mx-2">تعيين كلمة السر</h5>
                                            <input name="employee-single-4" value="reset-password-employees" type="checkbox" id="exampleInputEmail1">
                                        </div>
                                </div>
                            <!-- حذف  -->
                                <div class="col-lg-12 my-2">
                                        <div class="form-group mx-2 d-flex flex-row-reverse">
                                            <h5 for="fullName" class="text-right w-100 my-1 mx-2">حذف</h5>
                                            <input name="employee-single-5" value="delete-employees" type="checkbox" id="exampleInputEmail1">
                                        </div>
                                </div>
                        </div>
                        {{-- الصلاحيات --}}
                        <div id="one-role" class="col-4">
                                 {{-- العميل الفردي --}}
                            <div class="col-12 mb-3">
                                <h3 class="text-primary">صلاحيات الموظفين</h3 class="text-primary">
                            </div>

                            <!-- مشاهدة  -->
                                <div class="col-lg-12 my-2">
                                        <div class="form-group mx-2 d-flex flex-row-reverse">
                                            <h5 for="fullName" class="text-right w-100 my-1 mx-2">مشاهدة</h5>
                                            <input name="role-single-1" value="view-role" type="checkbox" id="exampleInputEmail1">
                                        </div>
                                </div>
                            <!-- إضافة  -->
                                <div class="col-lg-12 my-2">
                                        <div class="form-group mx-2 d-flex flex-row-reverse">
                                            <h5 for="fullName" class="text-right w-100 my-1 mx-2">إضافة</h5>
                                            <input name="role-single-2" value="create-role" type="checkbox" id="exampleInputEmail1">
                                        </div>
                                </div>
                            <!-- تعديل  -->
                                <div class="col-lg-12 my-2">
                                        <div class="form-group mx-2 d-flex flex-row-reverse">
                                            <h5 for="fullName" class="text-right w-100 my-1 mx-2">تعديل</h5>
                                            <input name="role-single-3" value="edit-role" type="checkbox" id="exampleInputEmail1">
                                        </div>
                                </div>
                            <!-- حذف  -->
                                <div class="col-lg-12 my-2">
                                        <div class="form-group mx-2 d-flex flex-row-reverse">
                                            <h5 for="fullName" class="text-right w-100 my-1 mx-2">حذف</h5>
                                            <input name="role-single-4" value="delete-role" type="checkbox" id="exampleInputEmail1">
                                        </div>
                                </div>
                        </div>
                        {{-- الشروط والأحكام --}}
                        <hr class="divider my-5 w-75 m-auto">
                        <div id="one-role" class="col-4">
                                 {{-- العميل الفردي --}}
                            <div class="col-12 mb-3">
                                <h3 class="text-primary">الشروط والأحكام</h3 class="text-primary">
                            </div>

                            <!-- مشاهدة  -->
                                <div class="col-lg-12 my-2">
                                        <div class="form-group mx-2 d-flex flex-row-reverse">
                                            <h5 for="fullName" class="text-right w-100 my-1 mx-2">مشاهدة</h5>
                                            <input name="term-single-1" value="view-term" type="checkbox" id="exampleInputEmail1">
                                        </div>
                                </div>
                            <!-- إضافة  -->
                                <div class="col-lg-12 my-2">
                                        <div class="form-group mx-2 d-flex flex-row-reverse">
                                            <h5 for="fullName" class="text-right w-100 my-1 mx-2">إضافة</h5>
                                            <input name="term-single-2" value="create-term" type="checkbox" id="exampleInputEmail1">
                                        </div>
                                </div>
                            <!-- تعطيل/تفعيل  -->
                                <div class="col-lg-12 my-2">
                                        <div class="form-group mx-2 d-flex flex-row-reverse">
                                            <h5 for="fullName" class="text-right w-100 my-1 mx-2">تعطيل/تفعيل</h5>
                                            <input name="term-single-3" value="trigger-term-status" type="checkbox" id="exampleInputEmail1">
                                        </div>
                                </div>
                            <!-- حذف  -->
                                <div class="col-lg-12 my-2">
                                        <div class="form-group mx-2 d-flex flex-row-reverse">
                                            <h5 for="fullName" class="text-right w-100 my-1 mx-2">حذف</h5>
                                            <input name="term-single-4" value="delete-term" type="checkbox" id="exampleInputEmail1">
                                        </div>
                                </div>
                        </div>
                        {{-- الأحكام الجزائية --}}
                        <div id="one-role" class="col-4">
                                 {{-- العميل الفردي --}}
                            <div class="col-12 mb-3">
                                <h3 class="text-primary">الأحكام الجزائية</h3 class="text-primary">
                            </div>

                            <!-- مشاهدة  -->
                                <div class="col-lg-12 my-2">
                                        <div class="form-group mx-2 d-flex flex-row-reverse">
                                            <h5 for="fullName" class="text-right w-100 my-1 mx-2">مشاهدة</h5>
                                            <input name="penal-single-1" value="view-penal" type="checkbox" id="exampleInputEmail1">
                                        </div>
                                </div>
                            <!-- إضافة  -->
                                <div class="col-lg-12 my-2">
                                        <div class="form-group mx-2 d-flex flex-row-reverse">
                                            <h5 for="fullName" class="text-right w-100 my-1 mx-2">إضافة</h5>
                                            <input name="penal-single-2" value="create-penal" type="checkbox" id="exampleInputEmail1">
                                        </div>
                                </div>
                            <!-- تعطيل/تفعيل  -->
                            <div class="col-lg-12 my-2">
                                <div class="form-group mx-2 d-flex flex-row-reverse">
                                    <h5 for="fullName" class="text-right w-100 my-1 mx-2">تعطيل/تفعيل</h5>
                                    <input name="penal-single-3" value="trigger-penal-status" type="checkbox" id="exampleInputEmail1">
                                </div>
                            </div>
                            <!-- حذف  -->
                                <div class="col-lg-12 my-2">
                                        <div class="form-group mx-2 d-flex flex-row-reverse">
                                            <h5 for="fullName" class="text-right w-100 my-1 mx-2">حذف</h5>
                                            <input name="penal-single-4" value="delete-penal" type="checkbox" id="exampleInputEmail1">
                                        </div>
                                </div>
                        </div>
                        {{-- سياسة الضمان --}}
                        <div id="one-role" class="col-4">
                                 {{-- العميل الفردي --}}
                            <div class="col-12 mb-3">
                                <h3 class="text-primary">سياسة الضمان</h3 class="text-primary">
                            </div>

                            <!-- مشاهدة  -->
                                <div class="col-lg-12 my-2">
                                        <div class="form-group mx-2 d-flex flex-row-reverse">
                                            <h5 for="fullName" class="text-right w-100 my-1 mx-2">مشاهدة</h5>
                                            <input name="waranty-single-1" value="view-waranty" type="checkbox" id="exampleInputEmail1">
                                        </div>
                                </div>
                            <!-- إضافة  -->
                                <div class="col-lg-12 my-2">
                                        <div class="form-group mx-2 d-flex flex-row-reverse">
                                            <h5 for="fullName" class="text-right w-100 my-1 mx-2">إضافة</h5>
                                            <input name="waranty-single-2" value="create-waranty" type="checkbox" id="exampleInputEmail1">
                                        </div>
                                </div>
                            <!-- تعطيل/تفعيل  -->
                            <div class="col-lg-12 my-2">
                                <div class="form-group mx-2 d-flex flex-row-reverse">
                                    <h5 for="fullName" class="text-right w-100 my-1 mx-2">تعطيل/تفعيل</h5>
                                    <input name="waranty-single-3" value="trigger-waranty-status" type="checkbox" id="exampleInputEmail1">
                                </div>
                            </div>
                            <!-- حذف  -->
                                <div class="col-lg-12 my-2">
                                        <div class="form-group mx-2 d-flex flex-row-reverse">
                                            <h5 for="fullName" class="text-right w-100 my-1 mx-2">حذف</h5>
                                            <input name="waranty-single-4" value="delete-waranty" type="checkbox" id="exampleInputEmail1">
                                        </div>
                                </div>
                        </div>
                        <hr class="divider my-5 w-75 m-auto">
                        {{-- واجبات الطرف التانى --}}
                        <div id="one-role" class="col-4">
                                 {{-- العميل الفردي --}}
                            <div class="col-12 mb-3">
                                <h3 class="text-primary">واجبات الطرف الثانى</h3 class="text-primary">
                            </div>

                            <!-- مشاهدة  -->
                                <div class="col-lg-12 my-2">
                                        <div class="form-group mx-2 d-flex flex-row-reverse">
                                            <h5 for="fullName" class="text-right w-100 my-1 mx-2">مشاهدة</h5>
                                            <input name="second-party-single--1" value="view-second-party" type="checkbox" id="exampleInputEmail1">
                                        </div>
                                </div>
                            <!-- إضافة  -->
                                <div class="col-lg-12 my-2">
                                        <div class="form-group mx-2 d-flex flex-row-reverse">
                                            <h5 for="fullName" class="text-right w-100 my-1 mx-2">إضافة</h5>
                                            <input name="second-party-single--2" value="create-second-party" type="checkbox" id="exampleInputEmail1">
                                        </div>
                                </div>
                            <!-- تعطيل/تفعيل  -->
                            <div class="col-lg-12 my-2">
                                <div class="form-group mx-2 d-flex flex-row-reverse">
                                    <h5 for="fullName" class="text-right w-100 my-1 mx-2">تعطيل/تفعيل</h5>
                                    <input name="second-party-single-3" value="trigger-second-party-status" type="checkbox" id="exampleInputEmail1">
                                </div>
                            </div>
                            <!-- حذف  -->
                                <div class="col-lg-12 my-2">
                                        <div class="form-group mx-2 d-flex flex-row-reverse">
                                            <h5 for="fullName" class="text-right w-100 my-1 mx-2">حذف</h5>
                                            <input name="second-party-single--4" value="delete-second-party" type="checkbox" id="exampleInputEmail1">
                                        </div>
                                </div>
                        </div>
                        {{-- مواصفات المصعد --}}
                        <div id="one-role" class="col-4">
                                 {{-- العميل الفردي --}}
                            <div class="col-12 mb-3">
                                <h3 class="text-primary">مواصفات المصعد</h3 class="text-primary">
                            </div>

                            <!-- مشاهدة  -->
                                <div class="col-lg-12 my-2">
                                        <div class="form-group mx-2 d-flex flex-row-reverse">
                                            <h5 for="fullName" class="text-right w-100 my-1 mx-2">مشاهدة</h5>
                                            <input name="elevator-specs-1" value="view-elevator-specs" type="checkbox" id="exampleInputEmail1">
                                        </div>
                                </div>
                            <!-- إضافة  -->
                                <div class="col-lg-12 my-2">
                                        <div class="form-group mx-2 d-flex flex-row-reverse">
                                            <h5 for="fullName" class="text-right w-100 my-1 mx-2">إضافة</h5>
                                            <input name="elevator-specs-2" value="create-elevator-specs" type="checkbox" id="exampleInputEmail1">
                                        </div>
                                </div>
                            <!-- تعطيل/تفعيل  -->
                            <div class="col-lg-12 my-2">
                                <div class="form-group mx-2 d-flex flex-row-reverse">
                                    <h5 for="fullName" class="text-right w-100 my-1 mx-2">تعطيل/تفعيل</h5>
                                    <input name="trigger-elevator-specs-single-3" value="trigger-elevator-specs-status" type="checkbox" id="exampleInputEmail1">
                                </div>
                            </div>
                            <!-- حذف  -->
                                <div class="col-lg-12 my-2">
                                        <div class="form-group mx-2 d-flex flex-row-reverse">
                                            <h5 for="fullName" class="text-right w-100 my-1 mx-2">حذف</h5>
                                            <input name="elevator-specs-4" value="delete-elevator-specs" type="checkbox" id="exampleInputEmail1">
                                        </div>
                                </div>
                        </div>
                        {{-- الحساب البنكى --}}
                        <div id="one-role" class="col-4">
                                 {{-- العميل الفردي --}}
                            <div class="col-12 mb-3">
                                <h3 class="text-primary">الحساب البنكى</h3 class="text-primary">
                            </div>

                            <!-- مشاهدة  -->
                                <div class="col-lg-12 my-2">
                                        <div class="form-group mx-2 d-flex flex-row-reverse">
                                            <h5 for="fullName" class="text-right w-100 my-1 mx-2">مشاهدة</h5>
                                            <input name="bank-account-1" value="view-bank-account" type="checkbox" id="exampleInputEmail1">
                                        </div>
                                </div>
                            <!-- تعديل  -->
                                <div class="col-lg-12 my-2">
                                        <div class="form-group mx-2 d-flex flex-row-reverse">
                                            <h5 for="fullName" class="text-right w-100 my-1 mx-2">تعديل</h5>
                                            <input name="bank-account-3" value="edit-bank-account" type="checkbox" id="exampleInputEmail1">
                                        </div>
                                </div>
                        </div>

                    </div>

                    <div class="card-footer text-right">
                                <div class="d-flex justify-content-between align-items-center flex-row-reverse">
                                    <button  type="submit" class="btn btn-success">تسجيل البيانات</button>
                                    بيانات خاصة بصلاحية جديدة لتحكم الموظفين فى البرنامج

                    </div>
                </div>

            </div>

        </form>

    </div>


</div>
@endsection


@section('script')
    <script>
         $(function () {
            $('#new-car').validate({
            rules: {
                roleName : {
                    required: true,
                },


            },
            messages: {
                roleName : {
                    required: "إسم الصلاحية مطلوب",
                },

            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
            $(element).addClass('is-valid');

            }
        });
    });
    </script>

      {{-- *********** Errors ************* --}}
      @if($errors->any())
        <script>
            @foreach($errors->all() as $error)
                    toastr.error('{{$error}}');
                    toastr.options.closeDuration = 5000;
            @endforeach
        </script>
     @endif

  {{-- ********* Error Message ********** --}}
  @if(session()->has('error'))
      <script>
          toastr.error("{{session('error')}}");
          toastr.options.closeDuration = 5000;
      </script>
  @endif

  {{-- ********* Success Message ********** --}}
  @if(session()->has('message'))
      <script>
          toastr.success("{{session('message')}}");
          toastr.options.closeDuration = 5000;
      </script>
  @endif

  <script>
   function checkAll(e){

        let inputs = document.querySelectorAll("input[type='checkbox']");
        let checked = e.target.checked;
        inputs.forEach(input =>{
            if (checked) {

                input.checked = true;
            } else {
                input.checked = false;

            }
        });
        console.log(e.target.checked);
    }
  </script>

@endsection
