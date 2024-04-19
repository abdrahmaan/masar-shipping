@extends('layout.master')
@section('title',"إضافة سيارة")
    

@section('content')

<div>
    <h4 class="mb-4">إضافة سيارة جديدة</h4>
</div>

<div class="row">

        
    <div class="col-12">
        <form id="new-car" action="/new-car" method="POST">
            @csrf
            <!-- بيانات السيارة -->
            <div class="card my-3">
                <div class="card-header d-flex align-items-center">   
                    <h3 class="card-title m-0">بيانات السيارة</h3>
                    <div class="card-tools mx-3">
                        <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#car-data" aria-expanded="true" aria-controls="car-data">
                            <i data-feather="plus"></i>
                        </button>
                        
                    </div>
                </div>
                <div class="collapse show" id="car-data">
                    <div class="card-body">
                        <div class="row justify-content-start">
                            <!-- ماركة السيارة -->
                                <div class="col-lg-3 my-2">
                                    <div class="form-group mx-2 d-block">
                                        <label for="Brand" class="text-right w-100 my-1">ماركة السيارة</label>
                                        <select name="Brand" class="form-control text-right" style="">
                                            <option value="Nissan">Nissan</option>
                                            <option value="Toyota">Toyota</option>
                                        </select>
                                    </div>
                                </div>
                            <!-- تصنيف السيارة -->

                                <div class="col-lg-3 my-2">
                                 <div class="form-group mx-2 d-block">
                                        <label for="Category" class="text-right w-100 my-1">تصنيف السيارة</label>
                                        <select name="Category" class="form-control text-right" style="min-width: 121px">
                                            <option value="Jeep">Jeep</option>
                                            <option value="Sedan">Sedan</option>
                                            <option value="Pickup">Pickup</option>
                                            <option value="VAN">VAN</option>
                                            <option value="Bus">Bus</option>
                                            <option value="Passengers">Passengers</option>
                                        </select>
                                    </div>
                            </div>
                            <!-- إسم الموديل  -->
                            <div class="col-lg-3 my-2">
                                <div class="form-group  mx-2 d-block">
                                    <label for="ModelName" class="text-right w-100 my-1">إسم الموديل</label>
                                    <input name="ModelName" type="text" class="form-control text-right" id="exampleInputEmail1" placeholder="إسم الموديل">
                                </div>
                            </div>
                            <!-- نوع الموديل  -->
                            <div class="col-lg-3 my-2">
                                    <div class="form-group  mx-2 d-block">
                                        <label for="ModelType" class="text-right w-100 my-1">نوع الموديل</label>
                                        <input name="ModelType" type="text" class="form-control text-right" id="exampleInputEmail1" placeholder="نوع الموديل">
                                    </div>
                                </div>
                            <!-- سنة الصنع  -->
                            <div class="col-lg-3 my-2">
                                <div class="form-group  mx-2 d-block">
                                    <label for="ModelYear" class="text-right w-100 my-1">سنة الصنع</label>
                                    <input name="ModelYear" type="number" class="form-control text-right" id="exampleInputEmail1" placeholder="سنة الصنع">
                                </div>
                            </div>
                            
                                                
                        </div>

                
                    </div>

                    <div class="card-footer text-right">
                        بيانات خاصة بالسيارة من حيث الماركة والموديل والتصنيف
                    </div>
                </div>

            </div>

            <!-- بيانات المحرك -->
            <div class="card my-3">
                <div class="card-header d-flex align-items-center">   
                    <h3 class="card-title m-0">بيانات المحرك</h3>
                    <div class="card-tools mx-3">
                        <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#car-moharek" aria-expanded="true" aria-controls="car-moharek">
                            <i data-feather="plus"></i>
                        </button>
                    </div>
                </div>
                <div class="collapse show" id="car-moharek">
                    <div class="card-body" >
                        <div class="row justify-content-start">
                            <!-- نوع الإنتقال  -->
                                <div class="col-lg-3 my-1">
                                    <div class="form-group mx-2 d-block">
                                        <label for="Transmission" class="text-right w-100 my-1">نوع الإنتقال</label>
                                        <select name="Transmission" class="form-control text-right" style="">
                                            <option value="A/T">A/T</option>
                                            <option value="M/T">M/T</option>
                                        </select>
                                    </div>
                                </div>
                            <!-- عدد الإنتقالات -->
                                <div class="col-lg-3 my-1">
                                <div class="form-group mx-2 d-block">
                                        <label for="TransmissionCount" class="text-right w-100 my-1">عدد الإنتقالات</label>
                                        <select name="TransmissionCount" class="form-control text-right" style="min-width: 121px">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
    
                                        </select>
                                    </div>
                            </div>
                            <!-- 4X4 -->
                                <div class="col-lg-3 my-1">
                                <div class="form-group mx-2 d-block">
                                        <label for="FourXFour" class="text-right w-100 my-1">4X4/4X2</label>
                                        <select name="FourXFour" class="form-control text-right" style="min-width: 121px">
                                            <option value="4X4">4X4</option>
                                            <option value="4X2">4X2</option>
                                            <option value="إفتراضى">إفتراضى</option>
    
    
                                        </select>
                                    </div>
                            </div>
                            <!-- نوع الدفع -->
                                <div class="col-lg-3 my-1">
                                <div class="form-group mx-2 d-block">
                                        <label for="PushingType" class="text-right w-100 my-1">نوع الدفع</label>
                                        <select name="PushingType" class="form-control text-right" style="min-width: 121px">
                                            <option value="أمامى">أمامى</option>
                                            <option value="خلفى">خلفى</option>
                                        </select>
                                    </div>
                            </div>
                            <!-- عدد CC  -->
                                <div class="col-lg-3 my-1">
                                        <div class="form-group  mx-2 d-block">
                                            <label for="CC" class="text-right w-100 my-1">CC</label>
                                            <input name="CC" type="number" class="form-control text-right" id="exampleInputEmail1" placeholder="CC قوة الـ">
                                        </div>
                                </div>
                            <!-- عدد السليندر -->
                                <div class="col-lg-3 my-1">
                                    <div class="form-group mx-2 d-block">
                                        <label for="Cylinder" class="text-right w-100 my-1">عدد السليندر</label>
                                        <select name="Cylinder" class="form-control text-right" style="min-width: 121px">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                        </select>
                                    </div>
                            </div>
                            <!-- قوة الحصان  -->
                            <div class="col-lg-3 my-1">
                                <div class="form-group  mx-2 d-block">
                                    <label for="HorsePower" class="text-right w-100 my-1">قوة الحصان</label>
                                    <input name="HorsePower" type="number" class="form-control text-right" id="exampleInputEmail1" placeholder="قوة الحصان">
                                </div>
                            </div>
                            <!-- نوع التانك -->
                            <div class="col-lg-3 my-1">
                                <div class="form-group mx-2 d-block">
                                        <label for="FuelType" class="text-right w-100 my-1">نوع التانك</label>
                                        <select name="FuelType" class="form-control text-right" style="min-width: 121px">
                                            <option value="Gas">Gas</option>
                                            <option value="Diesel">Diesel</option>
                                        </select>
                                    </div>
                            </div>
                            <!-- عدد الليترات/تانك  -->
                            <div class="col-lg-3 my-1">
                                <div class="form-group  mx-2 d-block">
                                    <label for="FuelLiter" class="text-right w-100 my-1">عدد الليترات/تانك</label>
                                    <input name="FuelLiter" type="number" class="form-control text-right" id="exampleInputEmail1" placeholder="عدد الليترات">
                                </div>
                            </div>                         
                        </div>
    
                
                    </div>
                    <div class="card-footer text-right">
                        بيانات خاصة بمحرك السيارة من حيث سرعة المحرك ونوع الوقود وعدد ليترات التانك
                    </div>
                </div>

                

            </div>


                <!-- أبعاد السيارة -->
            <div class="card my-3">
                <div class="card-header d-flex align-items-center">   
                    <h3 class="card-title m-0">أبعاد السيارة</h3>
                    <div class="card-tools mx-3">
                        <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#car-dim" aria-expanded="true" aria-controls="car-dim">
                            <i data-feather="plus"></i>
                        </button>
                    </div>
                </div>
                <div class="collapse show" id="car-dim">
                    <div class="card-body">
                        <div class="row justify-content-start">
                        
                            <!-- طول  -->
                                <div class="col-lg-3 my-1">
                                        <div class="form-group  mx-2 d-block">
                                            <label for="Height" class="text-right w-100 my-1">الطول</label>
                                            <input name="Height" type="number" class="form-control text-right" id="exampleInputEmail1" placeholder="الطول">
                                        </div>
                                </div>
                            <!-- عرض  -->
                                <div class="col-lg-3 my-1">
                                        <div class="form-group  mx-2 d-block">
                                            <label for="Width" class="text-right w-100 my-1">العرض</label>
                                            <input name="Width" type="number" class="form-control text-right" id="exampleInputEmail1" placeholder="العرض">
                                        </div>
                                </div>
                            <!-- إرتفاع  -->
                                <div class="col-lg-3 my-1">
                                        <div class="form-group  mx-2 d-block">
                                            <label for="Length" class="text-right w-100 my-1">الإرتفاع</label>
                                            <input name="Length" type="number" class="form-control text-right" id="exampleInputEmail1" placeholder="الإرتفاع">
                                        </div>
                                </div>
                            <!-- مقاس الكاوتش  -->
                                <div class="col-lg-3 my-1">
                                        <div class="form-group  mx-2 d-block">
                                            <label for="Tier" class="text-right w-100 my-1">مقاس الكاوتش</label>
                                            <input name="Tier" type="number" class="form-control text-right" id="exampleInputEmail1" placeholder="مقاس الكاوتش">
                                        </div>
                                </div>
                            <!-- عدد الركاب -->
                                <div class="col-lg-3 my-1">
                                <div class="form-group mx-2 d-block">
                                        <label for="Passengers" class="text-right w-100 my-1">عدد الركاب</label>
                                        <select name="Passengers" class="form-control text-right" style="min-width: 121px">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                        </select>
                                    </div>
                            </div>
                            <!-- سعر الشراء  -->
                            <div class="col-lg-3 my-1">
                                <div class="form-group  mx-2 d-block">
                                    <label for="PurchasePrice" class="text-right w-100 my-1">سعر الشراء</label>
                                    <input name="PurchasePrice" type="number" class="form-control text-right" id="exampleInputEmail1" placeholder="سعر الشراء">
                                </div>
                            </div> 
                        </div>
    
                
                    </div>
    
                    <div class="card-footer text-right">
                        <div class="d-flex justify-content-between align-items-center flex-row-reverse">
                            <button  type="submit" class="btn btn-success">تسجيل البيانات</button>
                             بيانات خاصة بأبعاد السيارة من حيث الطول والعرض والإرتفاع وعدد الركاب ونوع الإطار 
    
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
                ModelName : {
                    required: true,
                },
                ModelType : {
                    required: true,
                },
                ModelYear : {
                    required: true,
                    minlength: 4,
                    maxlength: 4,
                },
                CC: {
                    required: true
                },
                HorsePower: {
                    required: true
                },
                FuelLiter: {
                    required: true
                },
                Height: {
                    required: true
                },
                Width: {
                    required: true
                },
                Length: {
                    required: true
                },
                Tier: {
                    required: true
                },
                PurchasePrice: {
                    required: true
                },
            },
            messages: {
                ModelName : {
                    required: "من فضلك أدخل إسم الموديل",
                },
                ModelType : {
                    required: "من فضلك أدخل نوع الموديل",
                },
                ModelYear : {
                    required: "من فضلك أدخل سنة الصنع",
                    minlength: "من فضلك أدخل سنة صحيحة",
                    maxlength: "من فضلك أدخل سنة صحيحة",
                },
                CC: {
                    required: "CC من فضلك أدخل الـ"
                },
                HorsePower: {
                    required: "من فضلك أدخل قوة الحصان"
                },
                FuelLiter: {
                    required: "من فضلك أدخل عدد الليترات"
                },
                Height: {
                    required: "من فضلك أدخل طول السيارة"
                },
                Width: {
                    required: "من فضلك أدخل عرض السيارة"
                },
                Length: {
                    required: "من فضلك أدخل إرتفاع السيارة"
                },
                Tier: {
                    required: "من فضلك أدخل مقاس الكاوتش"
                },
                PurchasePrice: {
                    required: "من فضلك أدخل سعر شراء السيارة"
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