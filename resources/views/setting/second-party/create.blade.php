@extends('layout.master')
@section('title',"إضافة واجبات الطرف الثانى")


@section('content')

<div>
    <h4 class="mb-4">إضافة واجبات الطرف الثانى</h4>
</div>

<div class="row">


    <div class="col-12">
        <form id="new-car" action="/new-second-party" method="POST">
            @csrf

                <!-- بيانات واجبات الطرف الثانى -->
            <div class="card my-3">
                <div class="card-header d-flex align-items-center">
                    <h3 class="card-title m-0">بيانات واجبات الطرف الثانى</h3>
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
                                    <label for="type" class="text-right w-100 my-1">المطلوب</label>
                                    <select name="type" class="form-control text-right" style="min-width: 121px">
                                        <option value="كهرباء المصعد">كهرباء المصعد</option>
                                        <option value="القاطع">القاطع</option>
                                        <option value="الإضاءة">الإضاءة</option>
                                        <option value="التكييف">التكييف</option>
                                    </select>
                                </div>
                            </div>

                            <!--  اواجبات الطرف الثانى -->
                            <div class="col-lg-12 my-1">
                                <div class="form-group  mx-2 d-block">
                                    <label for="value" class="text-right w-100 my-1">المواصفات</label>
                                    <input name="value" type="text" class="form-control text-right" id="exampleInputEmail1" placeholder="المواصفات">
                                </div>
                            </div>





                        </div>


                    </div>

                    <div class="card-footer text-right">
                        <div class="d-flex justify-content-between align-items-center flex-row-reverse">
                            <button  type="submit" class="btn btn-success">تسجيل البيانات</button>
                            بيانات خاصة  بواجبات الطرف الثانى المعروضة فى عروض الاسعار والعقود الخاصة بالشركة

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
                    required: "نوع واجبات الطرف التانى مطلوب",
                },
                value : {
                    required: "المواصفات مطلوبة",

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
