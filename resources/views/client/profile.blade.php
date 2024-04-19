@extends('layout.master')
@section('title',"ملف العميل")
@php
    $permissions = session()->get('permissions');

@endphp

@section('content')
    <div class="page-content" style="margin-top: 0px !important">

        <div class="row">
        <div class="col-12 grid-margin">
            <div class="card mt-5 p-3">
            <div class="position-relative">
                <div class="d-flex flex-column align-items-center justify-content-center">
                    <img class="wd-70 rounded-circle" src="../../../assets/images/faces/face1.jpg" alt="profile">
                    <span class="h4 ms-3 text-dark my-2">{{$Data->fullName}}</span>
                    @if ($balance > 0)
                    <span class="badge bg-success fs-5 px-4">
                        <i class="me-1 icon-md" data-feather="dollar-sign"></i>
                        الرصيد : {{number_format($balance)}} ر.س
                    </span>
                    @else
                    <span class="badge bg-danger fs-5 px-4">
                        <i class="me-1 icon-md" data-feather="dollar-sign"></i>
                        الرصيد : {{number_format($balance)}} ر.س
                    </span>

                    @endif

                </div>

            </div>
            <div class="d-none d-flex justify-content-center p-3 rounded-bottom">
                <ul class="d-flex align-items-center m-0 p-0">
                <li class="d-flex align-items-center active">
                    <i class="me-1 icon-md text-primary" data-feather="columns"></i>
                    <a class="pt-1px d-none d-md-block text-primary" href="#">Timeline</a>
                </li>
                <li class="ms-3 ps-3 border-start d-flex align-items-center">
                    <i class="me-1 icon-md" data-feather="user"></i>
                    <a class="pt-1px d-none d-md-block text-body" href="#">About</a>
                </li>
                <li class="ms-3 ps-3 border-start d-flex align-items-center">
                    <i class="me-1 icon-md" data-feather="users"></i>
                    <a class="pt-1px d-none d-md-block text-body" href="#">Friends <span class="text-muted tx-12">3,765</span></a>
                </li>
                <li class="ms-3 ps-3 border-start d-flex align-items-center">
                    <i class="me-1 icon-md" data-feather="image"></i>
                    <a class="pt-1px d-none d-md-block text-body" href="#">Photos</a>
                </li>
                <li class="ms-3 ps-3 border-start d-flex align-items-center">
                    <i class="me-1 icon-md" data-feather="video"></i>
                    <a class="pt-1px d-none d-md-block text-body" href="#">Videos</a>
                </li>

                </ul>

            </div>
            {{-- User Buttons --}}
            <div class="d-flex w-100">
                <ul class="d-flex align-items-center m-0 p-0 justify-content-center w-100">
                    <li class="ms-3 ps-3 d-flex align-items-center">
                        <div class="btn-group" role="group">
                            <button id="btnGroupDrop1" type="button" class="btn rounded" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="me-1 icon-md" data-feather="file-text"></i>
                              إنشاء عقد
                            </button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                              <a class="dropdown-item" href="#">عقد توريد وتركيب مصعد</a>
                              <a class="dropdown-item" href="#">عقد تحديث مصعد</a>
                              <a class="dropdown-item" href="#">عقد صيانة</a>
                            </div>
                          </div>
                    </li>
                    <li class="ms-3 ps-3 border-start d-flex align-items-center">
                        <div class="btn-group" role="group">
                            <button id="btnGroupDrop1" type="button" class="btn  rounded" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="me-1 icon-md" data-feather="file-plus"></i>
                              إنشاء عرض سعر
                            </button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                              <a class="dropdown-item" href="#">عرض سعر توريد مصعد</a>
                              <a class="dropdown-item" href="#">عرض سعر تحديث مصعد</a>
                              <a class="dropdown-item" href="#">عرض سعر صيانة</a>
                            </div>
                          </div>
                    </li>
                    <li class="ms-3 ps-3 border-start d-flex align-items-center">
                        <div class="btn-group" role="group">
                            <button id="btnGroupDrop1" type="button" class="btn  rounded" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="me-1 icon-md" data-feather="edit-3"></i>
                              إنشاء معاملة
                            </button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                @if (in_array("create-appointment",$permissions))

                                <a class="dropdown-item" href="/new-appointment/{{$Data->id}}">إنشاء موعد جديد</a>
                                @endif
                                @if (in_array("create-letter",$permissions))

                                <a class="dropdown-item" href="/new-letter/{{$Data->id}}">إنشاء خطاب للعميل</a>
                                @endif
                                @if (in_array("create-financial-request",$permissions))

                                <a class="dropdown-item" href="/new-financial-request/{{$Data->id}}">إنشاء مطالبة مالية</a>
                                @endif
                                @if (in_array("create-payment",$permissions))
                                <a class="dropdown-item" href="/new-payment/{{$Data->id}}">إنشاء دفعة مالية</a>

                                @endif
                            </div>
                          </div>
                    </li>
                </ul>
            </div>
            </div>
        </div>
        </div>
        <div class="row profile-body flex-row-reverse">
            <!-- middle wrapper start -->
                <div class="col-md-8 col-xl-8 middle-wrapper">
                    <div class="row">
                        {{-- Old Design --}}
                    <div class="col-md-12 d-none grid-margin">
                        <div class="card rounded">
                        <div class="card-header">
                            <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <img class="img-xs rounded-circle" src="../../../assets/images/faces/face1.jpg" alt="">
                                <div class="ms-2">
                                <p>Mike Popescu</p>
                                <p class="tx-11 text-muted">1 min ago</p>
                                </div>
                            </div>
                            <div class="dropdown">
                                <a type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="icon-lg pb-3px" data-feather="more-horizontal"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="meh" class="icon-sm me-2"></i> <span class="">Unfollow</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="corner-right-up" class="icon-sm me-2"></i> <span class="">Go to post</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="share-2" class="icon-sm me-2"></i> <span class="">Share</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="copy" class="icon-sm me-2"></i> <span class="">Copy link</span></a>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="mb-3 tx-14">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus minima delectus nemo unde quae recusandae assumenda.</p>
                            <img class="img-fluid" src="../../../assets/images/photos/img2.jpg" alt="">
                        </div>
                        <div class="card-footer">
                            <div class="d-flex post-actions">
                            <a href="javascript:;" class="d-flex align-items-center text-muted me-4">
                                <i class="icon-md" data-feather="heart"></i>
                                <p class="d-none d-md-block ms-2">Like</p>
                            </a>
                            <a href="javascript:;" class="d-flex align-items-center text-muted me-4">
                                <i class="icon-md" data-feather="message-square"></i>
                                <p class="d-none d-md-block ms-2">Comment</p>
                            </a>
                            <a href="javascript:;" class="d-flex align-items-center text-muted">
                                <i class="icon-md" data-feather="share"></i>
                                <p class="d-none d-md-block ms-2">Share</p>
                            </a>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-12">
                               <!-- عقود توريد وتركيب -->
                            <div class="card my-3">
                                <div class="card-header d-flex align-items-center">
                                    <h3 class="card-title m-0">عقود التوريد والتركيب</h3>
                                    <div class="card-tools mx-3">
                                        <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#car-dim" aria-expanded="true" aria-controls="car-dim">
                                            <i data-feather="plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="collapse show" id="car-dim">
                                    <div class="card-body">

                                        <table id="new-elevator-table" class="table table-bordered table-striped">
                                            <div class="col-12"></div>
                                            <thead>
                                            <tr>


                                              <th>رقم العقد</th>
                                              <th>إسم النشاط</th>
                                              <th>الإسم</th>
                                              <th>الحى</th>
                                              <th>المدينة</th>
                                              <th>رقم الملف</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                                {{-- table body data --}}


                                                    <tr>
                                                       <td>1</td>
                                                       <td>أطلس الذهبية</td>
                                                       <td>كريم سيد</td>
                                                       <td>Imbaba</td>
                                                       <td>Giza</td>
                                                       <td>12668</td>
                                                    </tr>


                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>رقم العقد</th>
                                                    <th>إسم النشاط</th>
                                                    <th>الإسم</th>
                                                    <th>الحى</th>
                                                    <th>المدينة</th>
                                                    <th>رقم الملف</th>

                                                  </tr>
                                            </tfoot>
                                          </table>
                                    </div>

                                    <div class="card-footer text-right">
                                        <div class="d-flex justify-content-end align-items-center flex-row-reverse">
                                            بيانات عقود التوريد والتركيب الخاصة بالعميل

                                        </div>

                                    </div>
                                </div>

                            </div>
                               <!-- عقود تحديث مصعد -->
                            <div class="card my-3">
                                <div class="card-header d-flex align-items-center">
                                    <h3 class="card-title m-0">عقود تحديث مصعد</h3>
                                    <div class="card-tools mx-3">
                                        <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#update-elevator" aria-expanded="true" aria-controls="update-elevator">
                                            <i data-feather="plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="collapse show" id="update-elevator">
                                    <div class="card-body">

                                        <table id="update-elevator-table" class="table table-bordered table-striped">
                                            <div class="col-12"></div>
                                            <thead>
                                            <tr>


                                              <th>رقم العقد</th>
                                              <th>إسم النشاط</th>
                                              <th>الإسم</th>
                                              <th>الحى</th>
                                              <th>المدينة</th>
                                              <th>رقم الملف</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                                {{-- table body data --}}


                                                    <tr>
                                                       <td>1</td>
                                                       <td>أطلس الذهبية</td>
                                                       <td>كريم سيد</td>
                                                       <td>Imbaba</td>
                                                       <td>Giza</td>
                                                       <td>12668</td>
                                                    </tr>


                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>رقم العقد</th>
                                                    <th>إسم النشاط</th>
                                                    <th>الإسم</th>
                                                    <th>الحى</th>
                                                    <th>المدينة</th>
                                                    <th>رقم الملف</th>

                                                  </tr>
                                            </tfoot>
                                          </table>
                                    </div>

                                    <div class="card-footer text-right">
                                        <div class="d-flex justify-content-end align-items-center flex-row-reverse">
                                            بيانات عقود تحديث المصعد الخاصة بالعميل

                                        </div>

                                    </div>
                                </div>

                            </div>
                               <!-- عقود صيانة -->
                            <div class="card my-3">
                                <div class="card-header d-flex align-items-center">
                                    <h3 class="card-title m-0">عقود الصيانة</h3>
                                    <div class="card-tools mx-3">
                                        <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#maintaince-elevator" aria-expanded="true" aria-controls="maintaince-elevator">
                                            <i data-feather="plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="collapse show" id="maintaince-elevator">
                                    <div class="card-body">

                                        <table id="maintaince-elevator-table" class="table table-bordered table-striped">
                                            <div class="col-12"></div>
                                            <thead>
                                            <tr>


                                              <th>رقم العقد</th>
                                              <th>إسم النشاط</th>
                                              <th>الإسم</th>
                                              <th>الحى</th>
                                              <th>المدينة</th>
                                              <th>رقم الملف</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                                {{-- table body data --}}


                                                    <tr>
                                                       <td>1</td>
                                                       <td>أطلس الذهبية</td>
                                                       <td>كريم سيد</td>
                                                       <td>Imbaba</td>
                                                       <td>Giza</td>
                                                       <td>12668</td>
                                                    </tr>


                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>رقم العقد</th>
                                                    <th>إسم النشاط</th>
                                                    <th>الإسم</th>
                                                    <th>الحى</th>
                                                    <th>المدينة</th>
                                                    <th>رقم الملف</th>

                                                  </tr>
                                            </tfoot>
                                          </table>
                                    </div>

                                    <div class="card-footer text-right">
                                        <div class="d-flex justify-content-end align-items-center flex-row-reverse">
                                            بيانات عقود الصيانة الخاصة بالعميل

                                        </div>

                                    </div>
                                </div>

                            </div>
                               <!-- عرض سعر توريد وتركيب -->
                            <div class="card my-3">
                                <div class="card-header d-flex align-items-center">
                                    <h3 class="card-title m-0">عرض سعر التوريد والتركيب</h3>
                                    <div class="card-tools mx-3">
                                        <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#price-new-elevator" aria-expanded="true" aria-controls="price-new-elevator">
                                            <i data-feather="plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="collapse show" id="price-new-elevator">
                                    <div class="card-body">

                                        <table id="price-new-elevator-table" class="table table-bordered table-striped">
                                            <div class="col-12"></div>
                                            <thead>
                                            <tr>


                                              <th>رقم العقد</th>
                                              <th>إسم النشاط</th>
                                              <th>الإسم</th>
                                              <th>الحى</th>
                                              <th>المدينة</th>
                                              <th>رقم الملف</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                                {{-- table body data --}}


                                                    <tr>
                                                       <td>1</td>
                                                       <td>أطلس الذهبية</td>
                                                       <td>كريم سيد</td>
                                                       <td>Imbaba</td>
                                                       <td>Giza</td>
                                                       <td>12668</td>
                                                    </tr>


                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>رقم العقد</th>
                                                    <th>إسم النشاط</th>
                                                    <th>الإسم</th>
                                                    <th>الحى</th>
                                                    <th>المدينة</th>
                                                    <th>رقم الملف</th>

                                                  </tr>
                                            </tfoot>
                                          </table>
                                    </div>

                                    <div class="card-footer text-right">
                                        <div class="d-flex justify-content-end align-items-center flex-row-reverse">
                                            بيانات عرض سعر التوريد والتركيب الخاصة بالعميل

                                        </div>

                                    </div>
                                </div>

                            </div>
                               <!-- عرض سعر تحديث مصعد -->
                            <div class="card my-3">
                                <div class="card-header d-flex align-items-center">
                                    <h3 class="card-title m-0">عرض سعر تحديث مصعد</h3>
                                    <div class="card-tools mx-3">
                                        <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#price-update-elevator" aria-expanded="true" aria-controls="price-update-elevator">
                                            <i data-feather="plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="collapse show" id="price-update-elevator">
                                    <div class="card-body">

                                        <table id="price-update-elevator-table" class="table table-bordered table-striped">
                                            <div class="col-12"></div>
                                            <thead>
                                            <tr>


                                              <th>رقم العقد</th>
                                              <th>إسم النشاط</th>
                                              <th>الإسم</th>
                                              <th>الحى</th>
                                              <th>المدينة</th>
                                              <th>رقم الملف</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                                {{-- table body data --}}


                                                    <tr>
                                                       <td>1</td>
                                                       <td>أطلس الذهبية</td>
                                                       <td>كريم سيد</td>
                                                       <td>Imbaba</td>
                                                       <td>Giza</td>
                                                       <td>12668</td>
                                                    </tr>


                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>رقم العقد</th>
                                                    <th>إسم النشاط</th>
                                                    <th>الإسم</th>
                                                    <th>الحى</th>
                                                    <th>المدينة</th>
                                                    <th>رقم الملف</th>

                                                  </tr>
                                            </tfoot>
                                          </table>
                                    </div>

                                    <div class="card-footer text-right">
                                        <div class="d-flex justify-content-end align-items-center flex-row-reverse">
                                            بيانات عرض سعر تحديث المصعد الخاصة بالعميل

                                        </div>

                                    </div>
                                </div>

                            </div>
                               <!-- عرض سعر صيانة -->
                            <div class="card my-3">
                                <div class="card-header d-flex align-items-center">
                                    <h3 class="card-title m-0">عرض سعر الصيانة</h3>
                                    <div class="card-tools mx-3">
                                        <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#price-maintaince-elevator" aria-expanded="true" aria-controls="price-maintaince-elevator">
                                            <i data-feather="plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="collapse show" id="price-maintaince-elevator">
                                    <div class="card-body">

                                        <table id="price-maintaince-elevator-table" class="table table-bordered table-striped">
                                            <div class="col-12"></div>
                                            <thead>
                                            <tr>


                                              <th>رقم العقد</th>
                                              <th>إسم النشاط</th>
                                              <th>الإسم</th>
                                              <th>الحى</th>
                                              <th>المدينة</th>
                                              <th>رقم الملف</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                                {{-- table body data --}}


                                                    <tr>
                                                       <td>1</td>
                                                       <td>أطلس الذهبية</td>
                                                       <td>كريم سيد</td>
                                                       <td>Imbaba</td>
                                                       <td>Giza</td>
                                                       <td>12668</td>
                                                    </tr>


                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>رقم العقد</th>
                                                    <th>إسم النشاط</th>
                                                    <th>الإسم</th>
                                                    <th>الحى</th>
                                                    <th>المدينة</th>
                                                    <th>رقم الملف</th>

                                                  </tr>
                                            </tfoot>
                                          </table>
                                    </div>

                                    <div class="card-footer text-right">
                                        <div class="d-flex justify-content-end align-items-center flex-row-reverse">
                                            بيانات عرض سعر تحديث المصعد الخاصة بالعميل

                                        </div>

                                    </div>
                                </div>

                            </div>
                               <!-- تقارير صيانة -->
                            <div class="card my-3">
                                <div class="card-header d-flex align-items-center">
                                    <h3 class="card-title m-0">تقارير الصيانة</h3>
                                    <div class="card-tools mx-3">
                                        <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#maintaince-report" aria-expanded="true" aria-controls="maintaince-report">
                                            <i data-feather="plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="collapse show" id="maintaince-report">
                                    <div class="card-body">

                                        <table id="maintaince-report-table" class="table table-bordered table-striped">
                                            <div class="col-12"></div>
                                            <thead>
                                            <tr>


                                              <th>رقم العقد</th>
                                              <th>إسم النشاط</th>
                                              <th>الإسم</th>
                                              <th>الحى</th>
                                              <th>المدينة</th>
                                              <th>رقم الملف</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                                {{-- table body data --}}


                                                    <tr>
                                                       <td>1</td>
                                                       <td>أطلس الذهبية</td>
                                                       <td>كريم سيد</td>
                                                       <td>Imbaba</td>
                                                       <td>Giza</td>
                                                       <td>12668</td>
                                                    </tr>


                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>رقم العقد</th>
                                                    <th>إسم النشاط</th>
                                                    <th>الإسم</th>
                                                    <th>الحى</th>
                                                    <th>المدينة</th>
                                                    <th>رقم الملف</th>

                                                  </tr>
                                            </tfoot>
                                          </table>
                                    </div>

                                    <div class="card-footer text-right">
                                        <div class="d-flex justify-content-end align-items-center flex-row-reverse">
                                            بيانات تقارير الصيانة الخاصة بالعميل

                                        </div>

                                    </div>
                                </div>

                            </div>
                               <!-- بلاغات الأعطال -->
                            <div class="card my-3">
                                <div class="card-header d-flex align-items-center">
                                    <h3 class="card-title m-0">بلاغات الأعطال</h3>
                                    <div class="card-tools mx-3">
                                        <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#damadge-report" aria-expanded="true" aria-controls="damadge-report">
                                            <i data-feather="plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="collapse show" id="damadge-report">
                                    <div class="card-body">

                                        <table id="damadge-report-table" class="table table-bordered table-striped">
                                            <div class="col-12"></div>
                                            <thead>
                                            <tr>


                                              <th>رقم العقد</th>
                                              <th>إسم النشاط</th>
                                              <th>الإسم</th>
                                              <th>الحى</th>
                                              <th>المدينة</th>
                                              <th>رقم الملف</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                                {{-- table body data --}}


                                                    <tr>
                                                       <td>1</td>
                                                       <td>أطلس الذهبية</td>
                                                       <td>كريم سيد</td>
                                                       <td>Imbaba</td>
                                                       <td>Giza</td>
                                                       <td>12668</td>
                                                    </tr>


                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>رقم العقد</th>
                                                    <th>إسم النشاط</th>
                                                    <th>الإسم</th>
                                                    <th>الحى</th>
                                                    <th>المدينة</th>
                                                    <th>رقم الملف</th>

                                                  </tr>
                                            </tfoot>
                                          </table>
                                    </div>

                                    <div class="card-footer text-right">
                                        <div class="d-flex justify-content-end align-items-center flex-row-reverse">
                                            بيانات بلاغات الأعطال الخاصة بالعميل

                                        </div>

                                    </div>
                                </div>

                            </div>
                            @if (in_array("view-letters",$permissions))
                                    <!-- الخطابات -->
                                <div class="card my-3">
                                    <div class="card-header d-flex align-items-center">
                                        <h3 class="card-title m-0">خطابات العميل</h3>
                                        <div class="card-tools mx-3">
                                            <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#letters" aria-expanded="true" aria-controls="letters">
                                                <i data-feather="plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="collapse show" id="letters">
                                        <div class="card-body">

                                            <table id="letters-table" class="table table-bordered table-striped">
                                                <div class="col-12"></div>
                                                <thead>
                                                    <tr>


                                                    <th>رقم الملف</th>
                                                    <th>الإسم</th>
                                                    <th>رقم التليفون</th>
                                                    <th>تاريخ الخطاب</th>
                                                    <th>الموظف</th>
                                                    <th>التغييرات</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        {{-- table body data --}}

                                                        @foreach ($Data->letters as $row)
                                                            <tr>
                                                            <td>{{$row->client_id}}</td>
                                                                <td>
                                                                <a  href="/profile/{{$row->client_id}}">{{$row->fullName}}</a>
                                                                </td>
                                                                <td>{{$row->phone}}</td>
                                                                <td>{{explode(" ",$row->created_at)[0]}}</td>
                                                                <td>{{$row->op}}</td>
                                                                <td>
                                                                <button onclick="displayLetter(event)" data-letter='{{$row->letter_description}}' id="btnInfo" class="btn btn-primary">مشاهدة الخطاب</button>

                                                                </td>
                                                            </tr>
                                                        @endforeach

                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>رقم الملف</th>
                                                            <th>الإسم</th>
                                                            <th>رقم التليفون</th>
                                                            <th>تاريخ الخطاب</th>
                                                            <th>الموظف</th>
                                                            <th>التغييرات</th>

                                                        </tr>
                                                    </tfoot>
                                            </table>
                                        </div>

                                        <div class="card-footer text-right">
                                            <div class="d-flex justify-content-end align-items-center flex-row-reverse">
                                                بيانات الخطابات الخاصة بالعميل

                                            </div>

                                        </div>
                                    </div>

                                </div>
                            @endif
                            @if (in_array("view-appointments",$permissions))

                                <!-- المواعيد السابقة -->
                            <div class="card my-3">
                                <div class="card-header d-flex align-items-center">
                                    <h3 class="card-title m-0">مواعيد العميل</h3>
                                    <div class="card-tools mx-3">
                                        <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#appointments" aria-expanded="true" aria-controls="appointments">
                                            <i data-feather="plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="collapse show" id="appointments">
                                    <div class="card-body">

                                        <table id="appointments-table" class="table table-bordered table-striped">
                                            <div class="col-12"></div>
                                            <thead>
                                                <tr>


                                                <th>رقم الملف</th>
                                                <th>الإسم</th>
                                                <th>رقم التليفون</th>
                                                <th>رقم تليفون أخر</th>
                                                <th>العنوان</th>
                                                <th>الحى</th>
                                                <th>المدينة</th>
                                                <th>تاريخ الموعد</th>
                                                <th>اليوم</th>
                                                <th>الساعة</th>
                                                <th>حالة الموعد</th>
                                                <th>الموظف</th>
                                                <th>تاريخ الإضافة</th>
                                                <th>التغييرات</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                    {{-- table body data --}}

                                                    @foreach ($Data->appointments as $row)
                                                        <tr>
                                                        <td>{{$row->client_id}}</td>
                                                            <td>
                                                            <a  href="/profile/{{$row->client_id}}">{{$row->fullName}}</a>
                                                            </td>
                                                            <td>{{$row->phone}}</td>
                                                            <td>{{$row->phoneTwo}}</td>
                                                            <td>{{$row->address}}</td>
                                                            <td>{{$row->district}}</td>
                                                            <td>{{$row->city}}</td>
                                                            <td>{{$row->dateOfAppointment}}</td>
                                                            <td>{{$row->dayOfAppointment}}</td>
                                                            <td>{{$row->timeOfAppointment}}</td>
                                                            <td>{{$row->status}}</td>
                                                            <td>{{$row->op}}</td>
                                                            <td>{{$row->created_at}}</td>
                                                            <td>
                                                            <button onclick="displayReason(event)" data-reason='{{$row->reason}}' id="btnReason" class="btn btn-primary">سبب الموعد</button>
                                                            <button onclick="displayDescription(event)" data-opdesc='{{$row->op_description}}' id="btnInfo" class="btn btn-primary">ملاحظات</button>
                                                                <a href="/appointment-edit/{{$row->id}}" class="btn btn-success">
                                                                <i class="link-arrow fs-5" data-feather="edit-2"></i>
                                                                </a>

                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                    <th>رقم الملف</th>
                                                    <th>الإسم</th>
                                                    <th>رقم التليفون</th>
                                                    <th>رقم تليفون أخر</th>
                                                    <th>العنوان</th>
                                                    <th>الحى</th>
                                                    <th>المدينة</th>
                                                    <th>تاريخ الموعد</th>
                                                    <th>اليوم</th>
                                                    <th>الساعة</th>
                                                    <th>حالة الموعد</th>
                                                    <th>الموظف</th>
                                                    <th>تاريخ الإضافة</th>
                                                    <th>التغييرات</th>

                                                    </tr>
                                                </tfoot>
                                        </table>
                                    </div>

                                    <div class="card-footer text-right">
                                        <div class="d-flex justify-content-end align-items-center flex-row-reverse">
                                            بيانات المواعيد الخاصة بالعميل

                                        </div>

                                    </div>
                                </div>

                            </div>
                            @endif
                            @if (in_array("view-financial-request",$permissions))
                                    <!-- المطالبات المالية -->
                                <div class="card my-3">
                                    <div class="card-header d-flex align-items-center">
                                        <h3 class="card-title m-0">المطالبات المالية</h3>
                                        <div class="card-tools mx-3">
                                            <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#financial-requests" aria-expanded="true" aria-controls="financial-requests">
                                                <i data-feather="plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="collapse show" id="financial-requests">
                                        <div class="card-body">

                                            <table id="financial-requests-table" class="table table-bordered table-striped">
                                                <div class="col-12"></div>
                                                <thead>
                                                    <tr>


                                                    <th>رقم الملف</th>
                                                    <th>الإسم</th>
                                                    <th>رقم التليفون</th>
                                                    <th>رقم العقد</th>
                                                    <th>القيمة</th>
                                                    <th>القيمة كتابة</th>
                                                    <th>تاريخ السداد</th>


                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        {{-- table body data --}}

                                                        @foreach ($Data->financial_requests as $row)
                                                            <tr>
                                                            <td>{{$row->client_id}}</td>
                                                                <td>
                                                                <a  href="/profile/{{$row->client_id}}">{{$row->fullName}}</a>
                                                                </td>
                                                                <td>{{$row->phone}}</td>
                                                                <td>{{$row->contract_id}}</td>
                                                                <td>{{number_format($row->amount)}} ر.س</td>
                                                                <td>{{$row->amount_letters}}</td>
                                                                <td>{{$row->dateOfPay}}</td>


                                                            </tr>
                                                        @endforeach

                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>رقم الملف</th>
                                                            <th>الإسم</th>
                                                            <th>رقم التليفون</th>
                                                            <th>رقم العقد</th>
                                                            <th>القيمة</th>
                                                            <th>القيمة كتابة</th>
                                                            <th>تاريخ السداد</th>


                                                        </tr>
                                                    </tfoot>
                                            </table>
                                        </div>

                                        <div class="card-footer text-right">
                                            <div class="d-flex justify-content-end align-items-center flex-row-reverse">
                                                بيانات المطالبات المالية الخاصة بالعميل

                                            </div>

                                        </div>
                                    </div>

                                </div>

                            @endif
                            @if (in_array("view-payments",$permissions))
                                    <!-- الدفعات المالية -->
                                <div class="card my-3">
                                    <div class="card-header d-flex align-items-center">
                                        <h3 class="card-title m-0">الدفعات المالية</h3>
                                        <div class="card-tools mx-3">
                                            <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#payment" aria-expanded="true" aria-controls="payment">
                                                <i data-feather="plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="collapse show" id="payment">
                                        <div class="card-body">

                                            <table id="payments-table" class="table table-bordered table-striped">
                                                <div class="col-12"></div>
                                                <thead>
                                                    <tr>

                                                    <th>رقم الملف</th>
                                                    <th>الإسم</th>
                                                    <th>القيمة</th>
                                                    <th>نوع القيد</th>
                                                    <th>نوع العملية</th>
                                                    <th>رقم العقد</th>
                                                    <th>ملاحظات</th>
                                                    <th>تاريخ السداد</th>
                                                    <th>الموظف</th>
                                                    <th>التغييرات</th>



                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        {{-- table body data --}}

                                                        @foreach ($Data->payments as $row)
                                                            <tr>
                                                            <td>{{$row->client_id}}</td>
                                                                <td>
                                                                <a  href="/profile/{{$row->client_id}}">{{$row->clientName}}</a>
                                                                </td>
                                                                <td>{{number_format($row->amount)}} ر.س</td>
                                                                <td>{{$row->paymentType == "debit" ? "مدين" : "دائن"}}</td>
                                                                <td>{{$row->transactionType}}</td>
                                                                <td>{{$row->contract_id}}</td>
                                                                <td>{{$row->description}}</td>
                                                                <td>{{$row->dateOfPay}}</td>
                                                                <td>{{$row->op}}</td>
                                                                <td>
                                                                <a href="/delete-payment/{{$row->id}}" onclick="confirmDelete(event)" id="btnInfo" class="btn btn-danger">حذف</a>

                                                            </td>

                                                            </tr>
                                                        @endforeach

                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                        <th>رقم الملف</th>
                                                        <th>الإسم</th>
                                                        <th>القيمة</th>
                                                        <th>نوع القيد</th>
                                                        <th>نوع العملية</th>
                                                        <th>رقم العقد</th>
                                                        <th>ملاحظات</th>
                                                        <th>تاريخ السداد</th>
                                                        <th>الموظف</th>
                                                        <th>التغييرات</th>


                                                        </tr>
                                                    </tfoot>
                                            </table>
                                        </div>

                                        <div class="card-footer text-right">
                                            <div class="d-flex justify-content-end align-items-center flex-row-reverse">
                                                بيانات الدفعات المالية الخاصة بالعميل

                                            </div>

                                        </div>
                                    </div>

                                </div>

                            @endif
                    </div>

                    </div>
                </div>
            <!-- middle wrapper end -->
            {{-- Left Wrapper --}}
            <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
                <div class="card rounded">
                  <div class="card-body">
                    <div class="d-none d-flex align-items-center justify-content-between mb-2">
                      <h6 class="card-title mb-0">About</h6>
                      <div class="dropdown">
                        <a type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal icon-lg text-muted pb-3px"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item d-flex align-items-center" href="javascript:;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 icon-sm me-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg> <span class="">Edit</span></a>
                          <a class="dropdown-item d-flex align-items-center" href="javascript:;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-git-branch icon-sm me-2"><line x1="6" y1="3" x2="6" y2="15"></line><circle cx="18" cy="6" r="3"></circle><circle cx="6" cy="18" r="3"></circle><path d="M18 9a9 9 0 0 1-9 9"></path></svg> <span class="">Update</span></a>
                          <a class="dropdown-item d-flex align-items-center" href="javascript:;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye icon-sm me-2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg> <span class="">View all</span></a>
                        </div>
                      </div>
                    </div>
                    <p class="d-none">Hi! I'm Amiah the Senior UI Designer at NobleUI. We hope you enjoy the design and quality of Social.</p>

                    {{-- رقم الملف --}}
                    <div class="mt-3">
                      <label class="tx-11 fw-bolder mb-0 text-uppercase">رقم الملف:</label>
                      <p class="text-muted">{{$Data->id}}</p>
                    </div>
                    {{-- الإسم النشاط --}}
                    @isset($Data->tradeName)
                        <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">إسم النشاط:</label>
                        <p class="text-muted">{{$Data->tradeName}}</p>
                        </div>
                    @endisset
                    {{-- الإسم الثلاثى --}}
                    <div class="mt-3">
                      <label class="tx-11 fw-bolder mb-0 text-uppercase">الإسم الثلاثى:</label>
                      <p class="text-muted">{{$Data->fullName}}</p>
                    </div>

                    {{-- الجنس --}}
                    <div class="mt-3">
                      <label class="tx-11 fw-bolder mb-0 text-uppercase">الجنس:</label>
                      <p class="text-muted">{{$Data->gender}}</p>
                    </div>
                    {{-- الإيميل --}}
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">الإيميل:</label>
                        <p class="text-muted">{{$Data->email}}</p>
                      </div>
                    {{-- رقم الضريبي --}}
                    @isset($Data->taxNumber)
                        <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">رقم الضريبى:</label>
                        <p class="text-muted">{{$Data->taxNumber}}</p>
                        </div>
                    @endisset
                    {{-- الإسم النشاط --}}
                    @isset($Data->registerNumber)
                        <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">رقم السجل:</label>
                        <p class="text-muted">{{$Data->registerNumber}}</p>
                        </div>
                    @endisset
                    {{-- رقم التليفون --}}
                    <div class="mt-3">
                      <label class="tx-11 fw-bolder mb-0 text-uppercase">رقم التليفون:</label>
                      <p class="text-muted">{{$Data->phone}}</p>
                    </div>
                    {{-- رقم تليفون أخر --}}
                    <div class="mt-3">
                      <label class="tx-11 fw-bolder mb-0 text-uppercase">رقم تليفون اخر:</label>
                      <p class="text-muted">{{$Data->phoneTwo}}</p>
                    </div>
                    {{-- العنوان --}}
                    <div class="mt-3">
                      <label class="tx-11 fw-bolder mb-0 text-uppercase">العنوان:</label>
                      <p class="text-muted">{{$Data->address}}</p>
                    </div>
                    {{-- الحى --}}
                    <div class="mt-3">
                      <label class="tx-11 fw-bolder mb-0 text-uppercase">الحى:</label>
                      <p class="text-muted">{{$Data->district}}</p>
                    </div>
                    {{-- المدينة --}}
                    <div class="mt-3">
                      <label class="tx-11 fw-bolder mb-0 text-uppercase">المدينة:</label>
                      <p class="text-muted">{{$Data->city}}</p>
                    </div>
                    {{-- رقم الهوية --}}
                    @isset($Data->national_id)
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">رقم الهوية:</label>
                            <p class="text-muted">{{$Data->national_id}}</p>
                        </div>
                    @endisset
                    {{-- الرمز البريدى --}}
                    <div class="mt-3">
                      <label class="tx-11 fw-bolder mb-0 text-uppercase">الرمز البريدى:</label>
                      <p class="text-muted">{{$Data->postalCode}}</p>
                    </div>
                    {{-- تاريخ الميلاد --}}
                    @isset($Data->dateOfBirth)
                        <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">تاريخ الميلاد:</label>
                        <p class="text-muted">{{$Data->dateOfBirth}}</p>
                        </div>

                    @endisset

                    <div class="d-none mt-3 d-flex social-links">
                      <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>
                      </a>
                      <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>
                      </a>
                      <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            {{-- Left Wrapper End --}}

        </div>

    </div>
@endsection


@section('script')
<script>
    $(function () {
        // New Elevator Contracts
           $("#new-elevator-table").DataTable({
                "bInfo" : false,
                "paging": true,
                "responsive": true, "lengthChange": true, "autoWidth": false,
             }).buttons().container().appendTo('#new-elevator-table_wrapper .col-md-6:eq(0)');

             // Update Elevator Contracts
           $("#update-elevator-table").DataTable({
                "bInfo" : false,
                "paging": true,
                "responsive": true, "lengthChange": true, "autoWidth": false,
             }).buttons().container().appendTo('#update-elevator-table_wrapper .col-md-6:eq(0)');


             // Maintaince  Contracts
           $("#maintaince-elevator-table").DataTable({
                "bInfo" : false,
                "paging": true,
                "responsive": true, "lengthChange": true, "autoWidth": false,
             }).buttons().container().appendTo('#maintaince-elevator-table_wrapper .col-md-6:eq(0)');

        // Price List Elevator Contracts
           $("#price-new-elevator-table").DataTable({
                "bInfo" : false,
                "paging": true,
                "responsive": true, "lengthChange": true, "autoWidth": false,
             }).buttons().container().appendTo('#price-new-elevator-table_wrapper .col-md-6:eq(0)');

             // Price List Elevator Contracts
           $("#price-update-elevator-table").DataTable({
                "bInfo" : false,
                "paging": true,
                "responsive": true, "lengthChange": true, "autoWidth": false,
             }).buttons().container().appendTo('#price-update-elevator-table_wrapper .col-md-6:eq(0)');


             // Price List Maintaince  Contracts
           $("#price-maintaince-elevator-table").DataTable({
                "bInfo" : false,
                "paging": true,
                "responsive": true, "lengthChange": true, "autoWidth": false,
             }).buttons().container().appendTo('#price-maintaince-elevator-table_wrapper .col-md-6:eq(0)');

             // Maintaince  Reports
           $("#maintaince-report-table").DataTable({
                "bInfo" : false,
                "paging": true,
                "responsive": true, "lengthChange": true, "autoWidth": false,
             }).buttons().container().appendTo('#maintaince-report-table_wrapper .col-md-6:eq(0)');

             // Damage  Reports
           $("#damadge-report-table").DataTable({
                "bInfo" : false,
                "paging": true,
                "responsive": true, "lengthChange": true, "autoWidth": false,
             }).buttons().container().appendTo('#damadge-report-table_wrapper .col-md-6:eq(0)');

             // Letters
           $("#letters-table").DataTable({
                "bInfo" : false,
                "paging": true,
                "responsive": true, "lengthChange": true, "autoWidth": false,
             }).buttons().container().appendTo('#letters-table_wrapper .col-md-6:eq(0)');

             // Appointments
           $("#appointments-table").DataTable({
                "bInfo" : false,
                "paging": true,
                "responsive": true, "lengthChange": true, "autoWidth": false,
             }).buttons().container().appendTo('#appointments-table_wrapper .col-md-6:eq(0)');

             // Financial Requests
           $("#financial-requests-table").DataTable({
                "bInfo" : false,
                "paging": true,
                "responsive": true, "lengthChange": true, "autoWidth": false,
             }).buttons().container().appendTo('#financial-requests-table_wrapper .col-md-6:eq(0)');

             // Financial Requests
           $("#payments-table").DataTable({
                "bInfo" : false,
                "paging": true,
                "responsive": true, "lengthChange": true, "autoWidth": false,
             }).buttons().container().appendTo('#payments-table_wrapper .col-md-6:eq(0)');

         });

</script>
<script>

    function displayLetter(event) {

      let letter = event.target.dataset.letter;
      console.log(event.target);
      Swal.fire({
        icon: "info",
        title: "الخطاب",
        text: `${letter}`,
        confirmButtonColor: "red",
        confirmButtonText: "رجوع"
      });


    }

    function displayReason(event) {
              let reason = event.target.dataset.reason;
              Swal.fire({
                icon: "info",
                title: "سبب الموعد",
                text: `${reason}`,
                confirmButtonColor: "red",
                confirmButtonText: "رجوع"
              });
    }

    function displayDescription(event) {

        let desc = event.target.dataset.opdesc;
        console.log(event.target);
        Swal.fire({
        icon: "info",
        title: "ملاحظات على الموعد",
        text: `${desc}`,
        confirmButtonColor: "red",
        confirmButtonText: "رجوع"
        });
    }

    function confirmDelete(e) {
      e.preventDefault();
      Swal.fire({
          title: "هل أنت متأكد?",
          text: "لن تسطيع إستعادة البيانات!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "نعم, إحذف !",
          cancelButtonText: "إلغاء"
        }).then((result) => {
          if (result.isConfirmed) {

            window.location.href = e.target.href;
          }
          if (result.isDismissed) {

            Swal.fire({
              title: "بياناتك بـ أمان !",
              text: "تم إلغاء عملية الحذف",
              icon: "warning",
              confirmButtonText: "إخفاء",
              confirmButtonColor: "#d33",

            });
          }

        });

    }

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

@endsection
