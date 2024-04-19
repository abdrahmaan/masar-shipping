@extends('layout.master')
@section('title',"بيانات الحساب البنكى")


@section('content')

<div>
    <h4 class="mb-4">بيانات الحساب البنكى</h4>
</div>

<div class="row">


    <div class="col-12">
        <form id="new-car" action="/bank-account" method="POST">
            @csrf

                <!-- بيانات العميل -->
            <div class="card my-3">
                <div class="card-header d-flex align-items-center">
                    <h3 class="card-title m-0">بيانات الحساب البنكى</h3>
                    <div class="card-tools mx-3">
                        <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#car-dim" aria-expanded="true" aria-controls="car-dim">
                            <i data-feather="plus"></i>
                        </button>
                    </div>
                </div>
                <div class="collapse show" id="car-dim">
                    <div class="card-body">
                        <div class="row justify-content-start">


                            <!-- إسم الشركة  -->
                                <div class="col-lg-6 my-1">
                                        <div class="form-group  mx-2 d-block">
                                            <label for="companyName" class="text-right w-100 my-1">إسم الشركة</label>
                                            <input name="companyName" type="text" value="{{$Data->companyName ?? ""}}" class="form-control text-right" id="exampleInputEmail1" placeholder="إسم الشركة">
                                        </div>
                                </div>

                            <!-- إسم البنك  -->
                                <div class="col-lg-6 my-1">
                                        <div class="form-group  mx-2 d-block">
                                            <label for="bankName" class="text-right w-100 my-1">إسم البنك</label>
                                            <input name="bankName" type="text" value="{{$Data->bankName ?? ""}}" class="form-control text-right" id="exampleInputEmail1" placeholder="إسم البنك">
                                        </div>
                                </div>

                            <!-- رقم الحساب  -->
                                <div class="col-lg-6 my-1">
                                        <div class="form-group  mx-2 d-block">
                                            <label for="accNumber" class="text-right w-100 my-1">رقم الحساب البنكى</label>
                                            <input name="accNumber" type="number" value="{{$Data->accNumber ?? ""}}" class="form-control text-right" id="exampleInputEmail1" placeholder="رقم الحساب البنكى">
                                        </div>
                                </div>

                                  <!-- IBAN   -->
                                  <div class="col-lg-6 my-1">
                                    <div class="form-group  mx-2 d-block">
                                        <label for="iban" class="text-right w-100 my-1">رقم الـ IBAN </label>
                                        <input name="iban" type="text" value="{{$Data->iban ?? ""}}" class="form-control text-right" id="exampleInputEmail1" placeholder="رقم الـ IBAN ">
                                    </div>
                            </div>



                        </div>


                    </div>

                    <div class="card-footer text-right">
                        <div class="d-flex justify-content-between align-items-center flex-row-reverse">
                            <button  type="submit" class="btn btn-success">تسجيل البيانات</button>
                            بيانات خاصة بالحساب البنكى الخاص بالشركة لتسجيله فى العقود وعروض الأسعار

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
                companyName : {
                    required: true,
                },
                bankName : {
                    required: true,
                },
                accNumber : {
                    required: true,
                    minlength: 14,
                    maxlength: 14,


                },
                iban: {
                    required: true,
                    minlength: 24,
                    maxlength: 24,

                },


            },
            messages: {
                companyName : {
                    required: "إسم الشركة مطلوب",
                },
                bankName : {
                    required: "إسم البنك مطلوب",
                },
                accNumber : {
                    required: "رقم الحساب مطلوب",
                    minlength: "أدخل رقم الحساب من 14 رقم",
                    maxlength: "أدخل رقم الحساب من 14 رقم",
                },
                iban : {
                    required: "رقم الـ IBAN مطلوب",
                    minlength: "أدخل 24 رقم أو حرف",
                    maxlength: "أدخل 24 رقم أو حرف",


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
