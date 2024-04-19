@extends('layout.master')
@section('title',"إضافة مستخدم")
    

@section('content')

<div>
    <h4 class="mb-4">تغيير كلمة السر</h4>
</div>

<div class="row">

        
    <div class="col-12">
        <form id="change-password" action="/change-password" method="POST">
            @csrf
            <!-- بيانات السيارة -->
            <div class="card my-3">
                <div class="card-header d-flex align-items-center">   
                    <h3 class="card-title m-0">بيانات كلمة السر</h3>
                    <div class="card-tools mx-3">
                        <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#car-data" aria-expanded="true" aria-controls="car-data">
                            <i data-feather="plus"></i>
                        </button>
                        
                    </div>
                </div>
                <div class="collapse show" id="car-data">
                    <div class="card-body">
                        <div class="row justify-content-start">
                            <!-- كلمة السر القديمة  -->
                            <div class="col-lg-6">
                                <div class="form-group  mx-2 d-block">
                                    <label for="oldPassword" class="text-right w-100">كلمة السر القديمة</label>
                                    <input name="oldPassword" type="password" class="form-control text-right" id="exampleInputEmail1" placeholder="كلمة السر القديمة">
                                </div>
                            </div>
                            <!-- كلمة السر الجديدة  -->
                            <div class="col-lg-6">
                                <div class="form-group  mx-2 d-block">
                                    <label for="newPassword" class="text-right w-100">كلمة السر الجديدة</label>
                                    <input name="newPassword" type="password" class="form-control text-right" id="exampleInputEmail1" placeholder="كلمة السر الجديدة">
                                </div>
                            </div>
                               
                                                
                        </div>

                
                    </div>

                    <div class="card-footer text-right">
                        <div class="d-flex justify-content-between  align-items-center">
                            تغيير بيانات كلمة السر الخاصة بالمستخدم
                            <button  type="submit" class="btn btn-success">تغيير كلمة السر</button>

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
        $('#change-password').validate({
            rules: {
                
                oldPassword : {
                    required: true,
                    minlength: 6
                },
                newPassword : {
                    required: true,
                    minlength: 6
                },
               
            },
            messages: {
    
                oldPassword : {
                    required: "كلمة السر القديمة مطلوبة",
                    minlength: "أقل عدد أحرف لكلمة السر 6 حروف"
                },
                newPassword : {
                    required: "كلمة السر الجديدة مطلوبة",
                    minlength: "أقل عدد أحرف لكلمة السر 6 حروف"
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