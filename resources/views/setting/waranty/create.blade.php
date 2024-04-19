@extends('layout.master')
@section('title',"إضافة سياسات الضمان")


@section('content')

<div>
    <h4 class="mb-4">إضافة سياسات الضمان</h4>
</div>

<div class="row">


    <div class="col-12">
        <form id="new-car" action="/new-waranty-policiy" method="POST">
            @csrf

                <!-- بيانات الشروط والأحكام -->
            <div class="card my-3">
                <div class="card-header d-flex align-items-center">
                    <h3 class="card-title m-0">بيانات سياسات الضمان</h3>
                    <div class="card-tools mx-3">
                        <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#car-dim" aria-expanded="true" aria-controls="car-dim">
                            <i data-feather="plus"></i>
                        </button>
                    </div>
                </div>
                <div class="collapse show" id="car-dim">
                    <div class="card-body">
                        <div class="row justify-content-start">





                            <!--  سياسات الضمان -->
                            <div class="col-lg-12 my-1">
                                <div class="form-group  mx-2 d-block">
                                    <label for="policiy" class="text-right w-100 my-1">سياسات الضمان</label>
                                    <input name="policiy" type="text" class="form-control text-right" id="exampleInputEmail1" placeholder="البند">
                                </div>
                            </div>





                        </div>


                    </div>

                    <div class="card-footer text-right">
                        <div class="d-flex justify-content-between align-items-center flex-row-reverse">
                            <button  type="submit" class="btn btn-success">تسجيل البيانات</button>
                            بيانات خاصة بسياسة الضمان المعروضة فى عقود الصيانة بالشركة

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
                policiy : {
                    required: true,
                },



            },
            messages: {
                policiy : {
                    required: "بند سياسة الضمان مطلوب",
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
