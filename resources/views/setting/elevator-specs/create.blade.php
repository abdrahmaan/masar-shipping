@extends('layout.master')
@section('title',"إضافة مواصفات المصعد")


@section('content')

<div>
    <h4 class="mb-4">إضافة مواصفات المصعد</h4>
</div>

<div class="row">


    <div class="col-12">
        <form id="new-car" action="/new-elevator-specification" method="POST">
            @csrf

                <!-- بيانات مواصفات المصعد -->
            <div class="card my-3">
                <div class="card-header d-flex align-items-center">
                    <h3 class="card-title m-0">بيانات مواصفات المصعد</h3>
                    <div class="card-tools mx-3">
                        <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#car-dim" aria-expanded="true" aria-controls="car-dim">
                            <i data-feather="plus"></i>
                        </button>
                    </div>
                </div>
                <div class="collapse show" id="car-dim">
                    <div class="card-body">
                        <div class="row justify-content-start">



                                <!-- النوع -->
                             <div class="col-lg-3 my-1">
                                <div class="form-group mx-2 d-block">
                                    <label for="type" class="text-right w-100 my-1">مواصفات المصعد</label>
                                    <select name="type" class="form-control text-right" style="min-width: 121px">
                                        <option value="استخدام المصعد">إستخدام المصعد</option>
                                        <option value="نوع المصعد">نوع المصعد</option>
                                        <option value="الموديل">الموديل</option>
                                        <option value="نظام يو بي أس">نظام يو بي أس</option>
                                        <option value="نظام التشغيل">نظام التشغيل</option>
                                        <option value="الحمولة">الحمولة</option>
                                        <option value="السرعة">السرعة</option>
                                        <option value="مقاس سكك الثقل">مقاس سكك الثقل</option>
                                        <option value="مقاس سكك الكابينة">مقاس سكك الكابينة</option>
                                        <option value="نظام الباب">نظام الباب</option>
                                        <option value="اتجاه فتح الباب">اتجاه فتح الباب</option>
                                        <option value="ديكور الأبواب">ديكور الأبواب</option>
                                        <option value="ديكور الكابينة">ديكور الكابينة</option>
                                        <option value="ديكور السقف">ديكور السقف</option>
                                        <option value="نوع الرخام">نوع الرخام</option>
                                        <option value="نوع الطلبات">نوع الطلبات</option>
                                    </select>
                                </div>
                            </div>

                            <!--  اواجبات الطرف الثانى -->
                            <div class="col-lg-12 my-1">
                                <div class="form-group  mx-2 d-block">
                                    <label for="value" class="text-right w-100 my-1">القيمة</label>
                                    <input name="value" type="text" class="form-control text-right" id="exampleInputEmail1" placeholder="المواصفات">
                                </div>
                            </div>





                        </div>


                    </div>

                    <div class="card-footer text-right">
                        <div class="d-flex justify-content-between align-items-center flex-row-reverse">
                            <button  type="submit" class="btn btn-success">تسجيل البيانات</button>
                            بيانات خاصة  بمواصفات المصعد المعروضة فى عروض الاسعار والعقود الخاصة بالشركة

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
                type : {
                    required: true,
                },
                value : {
                    required: true,

                },


            },
            messages: {
                type : {
                    required: "نوع مواصفات المصعد مطلوبة",
                },
                value : {
                    required: "القيمة مطلوبة",

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
