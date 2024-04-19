@extends('layout.master')
@section('title',"إضافة دفعة مالية")


@section('content')

<div>
    <h4 class="mb-4">إضافة دفعة مالية</h4>
</div>

<div class="row">


    <div class="col-12">
        <form id="new-car" action="/save-payment" method="POST">
            @csrf
                <!-- بيانات العميل -->
            <div class="card my-3">
                <div class="card-header d-flex align-items-center">
                    <h3 class="card-title m-0">بيانات الدفعة المالية</h3>
                    <div class="card-tools mx-3">
                        <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#car-dim" aria-expanded="true" aria-controls="car-dim">
                            <i data-feather="plus"></i>
                        </button>
                    </div>
                </div>
                <div class="collapse show" id="car-dim">
                    <div class="card-body">
                        <div class="row justify-content-start">

                            <!-- ID  -->
                                <input name="client_id" value="{{$Data->id}}" hidden type="text" class="form-control text-right" id="exampleInputEmail1" placeholder="الإسم ثلاثى">
                            <!-- الإسم ثلاثى  -->
                                <div class="col-lg-4 my-1">
                                        <div class="form-group  mx-2 d-block">
                                            <label for="clientName" class="text-right w-100 my-1">الإسم ثلاثى</label>
                                            <a href="/profile/{{$Data->id}}">
                                                <input name="clientName" readonly value="{{$Data->tradeName ?? $Data->fullName}}" type="text" style="cursor: pointer !important; color:blue" class="form-control text-right" id="exampleInputEmail1" placeholder="الإسم ثلاثى">
                                            </a>
                                        </div>
                                </div>

                            <!-- رقم التليفون  -->
                                <div class="col-lg-4 my-1">
                                        <div class="form-group  mx-2 d-block">
                                            <label for="phone" class="text-right w-100 my-1">رقم التليفون</label>
                                            <input name="phone" readonly value="{{$Data->phone}}" type="text" class="form-control text-right" id="exampleInputEmail1" placeholder="رقم التليفون">
                                        </div>
                                </div>
                            <!-- رقم العقد  -->
                                <div class="col-lg-4 my-1">
                                        <div class="form-group  mx-2 d-block">
                                            <label for="contract_id" class="text-right w-100 my-1">رقم العقد</label>
                                            <input name="contract_id"  type="number" class="form-control text-right" id="exampleInputEmail1" placeholder="رقم العقد ">
                                        </div>
                                </div>

                                 <!-- نوع القيد  -->
                              <div class="col-lg-4 my-1">
                                <div class="form-group  mx-2 d-block">
                                    <label for="paymentType" class="text-right w-100 my-1">نوع القيد</label>
                                    <select class="form-control text-right" name="paymentType" id="">
                                        <option value="debit">مدين</option>
                                        <option value="credit">دائن</option>
                                    </select>
                                </div>
                            </div>
                                 <!-- نوع المعاملة  -->
                              <div class="col-lg-4 my-1">
                                <div class="form-group  mx-2 d-block">
                                    <label for="transactionType" class="text-right w-100 my-1">نوع المعاملة</label>
                                    <select class="form-control text-right" name="transactionType" id="">
                                        <option value="دفعة جديدة">دفعة جديدة</option>
                                        <option value="إسترجاع">إسترجاع</option>
                                        <option value="إلغاء">إلغاء</option>
                                    </select>
                                </div>
                            </div>
                                 <!-- القيمة  -->
                              <div class="col-lg-4 my-1">
                                <div class="form-group  mx-2 d-block">
                                    <label for="amount" class="text-right w-100 my-1">القيمة أرقام</label>
                                    <input name="amount"  type="number" class="form-control text-right" id="exampleInputEmail1" placeholder="القيمة أرقام">
                                </div>
                            </div>




                         <!-- ملاحظات  -->
                         <div class="col-lg-8 my-1">
                            <div class="form-group  mx-2 d-block">
                                <label for="description" class="text-right w-100 my-1">ملاحظات</label>
                                <input name="description"  type="text" class="form-control text-right" id="exampleInputEmail1" placeholder="ملاحظات">
                            </div>
                        </div>
                             <!--  التاريخ -->
                             <div class="col-lg-4 my-1">
                                <div class="form-group  mx-2 d-block">
                                    <label for="dateOfPay" class="text-right w-100 my-1">تاريخ السداد</label>
                                    <input name="dateOfPay" type="date" class="form-control text-right" id="exampleInputEmail1" placeholder="تاريخ السداد">
                                </div>
                            </div>




                        </div>


                    </div>

                    <div class="card-footer text-right">
                        <div class="d-flex justify-content-between align-items-center flex-row-reverse">
                            <button  type="submit" class="btn btn-success">تسجيل البيانات</button>
                            بيانات خاصة بالدفعة المالية من قبل للعميل

                        </div>

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
                clientName : {
                    required: true,
                },

                paymentType : {
                    required: true,
                },
                transactionType : {
                    required: true,
                },
                phone : {
                    required: true,
                },

                contract_id : {
                    required: true,
                },

                amount : {
                    required: true,
                },


                dateOfPay : {
                    required: true,
                },


            },
            messages: {
                clientName : {
                    required: "الإسم الثلاثى مطلوب",
                },
                phone : {
                    required: "رقم التليفون مطلوب",
                },
                paymentType : {
                    required:  "نوع القيد مطلوب",
                },
                transactionType : {
                    required: "نوع المعاملة مطلوب",
                },
                contract_id : {
                    required: "رقم العقد مطلوب",
                },

                amount : {
                    required: "القيمة بالأرقام مطلوبة",
                },



                dateOfPay : {
                    required: "تاريخ السداد مطلوب",
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

@endsection
