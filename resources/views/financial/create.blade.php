@extends('layout.master')
@section('title',"إضافة مطالبة مالية")


@section('content')

<div>
    <h4 class="mb-4">إضافة مطالبة مالية</h4>
</div>

<div class="row">


    <div class="col-12">
        <form id="new-car" action="/save-financial-request" method="POST">
            @csrf
                <!-- بيانات العميل -->
            <div class="card my-3">
                <div class="card-header d-flex align-items-center">
                    <h3 class="card-title m-0">بيانات المطالبة المالية</h3>
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
                                            <label for="fullName" class="text-right w-100 my-1">الإسم ثلاثى</label>
                                            <a href="/profile/{{$Data->id}}">
                                                <input name="fullName" readonly value="{{$Data->tradeName ?? $Data->fullName}}" type="text" style="cursor: pointer !important; color:blue" class="form-control text-right" id="exampleInputEmail1" placeholder="الإسم ثلاثى">
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

                                 <!-- القيمة  -->
                              <div class="col-lg-4 my-1">
                                <div class="form-group  mx-2 d-block">
                                    <label for="amount" class="text-right w-100 my-1">القيمة أرقام</label>
                                    <input name="amount"  type="number" class="form-control text-right" id="exampleInputEmail1" placeholder="القيمة أرقام">
                                </div>
                            </div>
                            <!--  القيمة كتابة -->
                            <div class="col-lg-8 my-1">
                                <div class="form-group  mx-2 d-block">
                                    <label for="amount_letters" class="text-right w-100 my-1">القيمة كتابة</label>
                                    <input name="amount_letters" type="text"  class="form-control text-right" id="exampleInputEmail1" placeholder="القيمة كتابة">
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
                            بيانات خاصة بالمطالبة المالية لإرسالها للعميل

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
                fullName : {
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

                amount_letters : {
                    required: true,
                },

                dateOfPay : {
                    required: true,
                },


            },
            messages: {
                fullName : {
                    required: "الإسم الثلاثى مطلوب",
                },
                phone : {
                    required: "رقم التليفون مطلوب",
                },
                contract_id : {
                    required: "رقم العقد مطلوب",
                },

                amount : {
                    required: "القيمة بالأرقام مطلوبة",
                },

                amount_letters : {
                    required: "القيمة بالأحرف العربية مطلوبة",
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
