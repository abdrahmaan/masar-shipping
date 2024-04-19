@extends('layout.master')
@section('title',"إضافة الأحكام الجزائية")


@section('content')

<div>
    <h4 class="mb-4">إضافة الأحكام الجزائية</h4>
</div>

<div class="row">


    <div class="col-12">
        <form id="new-car" action="/new-penal-provision" method="POST">
            @csrf

                <!-- بيانات الأحكام الجزائية -->
            <div class="card my-3">
                <div class="card-header d-flex align-items-center">
                    <h3 class="card-title m-0">بيانات الأحكام الجزائية</h3>
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
                                    <label for="contract_type" class="text-right w-100 my-1">نوع المستند</label>
                                    <select name="contract_type" class="form-control text-right" style="min-width: 121px">
                                        <optgroup label="عقود">
                                            <option value="عقد - توريد وتركيب مصعد">عقد - توريد وتركيب مصعد</option>
                                            <option value="عقد - تحديث مصعد">عقد - تحديث مصعد</option>
                                            <option value="عقد - صيانة">عقد - صيانة</option>
                                        </optgroup>

                                    </select>
                                </div>
                            </div>

                            <!--  الأحكام الجزائية -->
                            <div class="col-lg-12 my-1">
                                <div class="form-group  mx-2 d-block">
                                    <label for="penal" class="text-right w-100 my-1">الأحكام الجزائية</label>
                                    <input name="penal" type="text" class="form-control text-right" id="exampleInputEmail1" placeholder="البند">
                                </div>
                            </div>





                        </div>


                    </div>

                    <div class="card-footer text-right">
                        <div class="d-flex justify-content-between align-items-center flex-row-reverse">
                            <button  type="submit" class="btn btn-success">تسجيل البيانات</button>
                            بيانات خاصة بالشروط والأحكام المعروضة فى عروض الاسعار والعقود الخاصة بالشركة

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
                contract_type : {
                    required: true,
                },
                penal : {
                    required: true,

                },


            },
            messages: {
                contract_type : {
                    required: "نوع المتسند مطلوب",
                },
                penal : {
                    required: "بند الأحكام الجزائية مطلوب",

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
