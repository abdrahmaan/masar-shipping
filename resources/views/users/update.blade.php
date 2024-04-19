@extends('layout.master')
@section('title',"تعديل موظف")


@section('content')

<div>
    <h4 class="mb-4">تعديل موظف</h4>
</div>

<div class="row">


    <div class="col-12">
        <form id="new-user" action="/employees/edit/{{$Data["id"]}}" method="POST">
            @csrf
            <!-- بيانات السيارة -->
            <div class="card my-3">
                <div class="card-header d-flex align-items-center">
                    <h3 class="card-title m-0">بيانات الموظف</h3>
                    <div class="card-tools mx-3">
                        <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#car-data" aria-expanded="true" aria-controls="car-data">
                            <i data-feather="plus"></i>
                        </button>

                    </div>
                </div>
                <div class="collapse show" id="car-data">
                    <div class="card-body">
                        <div class="row justify-content-start">


                              <!-- الإسم ثلاثى  -->
                              <div class="col-lg-4">
                                <div class="form-group  mx-2 d-block">
                                    <label for="name" class="text-right w-100 my-1">إسم الموظف</label>
                                    <input name="name" type="text" value="{{$Data["name"]}}" class="form-control text-right" id="exampleInputEmail1" placeholder="الإسم ثلاثى">
                                </div>
                            </div>

                              <!-- رقم التليفون  -->
                              <div class="col-lg-4">
                                <div class="form-group  mx-2 d-block">
                                    <label for="phone" class="text-right w-100 my-1">رقم التليفون</label>
                                    <input name="phone" type="number" value="{{$Data["phone"]}}" class="form-control text-right" id="exampleInputEmail1" placeholder="رقم التليفون">
                                </div>
                            </div>

                              <!-- رقم التليفون  أخر -->
                              <div class="col-lg-4">
                                <div class="form-group  mx-2 d-block">
                                    <label for="phoneTwo" class="text-right w-100 my-1">رقم التليفون أخر</label>
                                    <input name="phoneTwo" type="number" value="{{$Data["phoneTwo"]}}" class="form-control text-right" id="exampleInputEmail1" placeholder="رقم التليفون أخر">
                                </div>
                            </div>

                              <!--  العنوان -->
                            <div class="col-lg-8 my-1">
                                <div class="form-group  mx-2 d-block">
                                    <label for="address" class="text-right w-100 my-1">العنوان</label>
                                    <input name="address" type="text" value="{{$Data["address"]}}" class="form-control text-right" id="exampleInputEmail1" placeholder="العنوان">
                                </div>
                            </div>

                            <!-- الحي -->
                            <div class="col-lg-2 my-1">
                                <div class="form-group mx-2 d-block">
                                    <label for="district" class="text-right w-100 my-1">الحي</label>
                                    <select name="district"  class="form-control text-right" style="min-width: 121px">
                                         <option disabled>الإختيار المحدد</option>
                                            <option value="{{$Data["district"]}}">{{$Data["district"]}}</option>
                                            <option disabled>الإختيارات المتاحة</option>
                                            <optgroup label="أحياء شرق الرياض">
                                              <option value="الرمال">الرمال</option>
                                              <option value="اليرموك">اليرموك</option>
                                              <option value="المونسية">المونسية</option>
                                              <option value="النهضة">النهضة</option>
                                              <option value="اشبيلية">اشبيلية</option>
                                              <option value="الخليج">الخليج</option>
                                              <option value="الملز">الملز</option>
                                              <option value="الملك فيصل">الملك فيصل</option>
                                              <option value="النظيم">النظيم</option>
                                              <option value="قرطبة">قرطبة</option>
                                              <option value="السعادة">السعادة</option>
                                              <option value="الجنادرية">الجنادرية</option>
                                              <option value="النسيم الغربي">النسيم الغربي</option>
                                              <option value="الشهداء">الشهداء</option>
                                              <option value="القادسية">القادسية</option>
                                              <option value="المعيزلة">المعيزلة</option>
                                              <option value="الروضة">الروضة</option>
                                              <option value="السلام">السلام</option>
                                              <option value="الفيحاء">الفيحاء</option>
                                              <option value="القدس">القدس</option>
                                              <option value="غرناطة">غرناطة</option>
                                              <option value="الروابي">الروابي</option>
                                              <option value="الازدهار">الازدهار</option>
                                              <option value="الاندلس">الاندلس</option>
                                              <option value="المنار">المنار</option>
                                              <option value="الحمراء">الحمراء</option>
                                              <option value="الريان">الريان</option>
                                              <option value="الجزيرة">الجزيرة</option>
                                              <option value="الصفا">الصفا</option>
                                              <option value="الرماية">الرماية</option>
                                              <option value="الملك عبدالعزيز">الملك عبدالعزيز</option>
                                              <option value="النسيم الشرقي">النسيم الشرقي</option>
                                              <option value="الندوة">الندوة</option>
                                            </optgroup>
                                            <optgroup label="أحياء غرب الرياض">
                                                <option value="ظهرة لبن">ظهرة لبن</option>
                                                <option value="طويق">طويق</option>
                                                <option value="نمار">نمار</option>
                                                <option value="العريجاء الغربية">العريجاء الغربية</option>
                                                <option value="المهدية">المهدية</option>
                                                <option value="الحزم">الحزم</option>
                                                <option value="السويدي الغربي">السويدي الغربي</option>
                                                <option value="العريجاء الوسطى">العريجاء الوسطى</option>
                                                <option value="ام الحمام الغربي">ام الحمام الغربي</option>
                                                <option value="الزهرة">الزهرة</option>
                                                <option value="البديعة">البديعة</option>
                                                <option value="السويدي">السويدي</option>
                                                <option value="عرقة">عرقة</option>
                                                <option value="الجرادية">الجرادية</option>
                                                <option value="ظهرة البديعة">ظهرة البديعة</option>
                                                <option value="ديراب">ديراب</option>
                                                <option value="لبن">لبن</option>
                                                <option value="الدريهمية">الدريهمية</option>
                                                <option value="ام الحمام الشرقي">ام الحمام الشرقي</option>
                                                <option value="سلطانة">سلطانة</option>
                                                <option value="شبرا">شبرا</option>
                                                <option value="الرائد">الرائد</option>
                                                <option value="الرفيعة">الرفيعة</option>
                                                <option value="الفاخرية">الفاخرية</option>
                                                <option value="العريجاء">العريجاء</option>
                                                <option value="عليشة">عليشة</option>
                                                <option value="الخزامى">الخزامى</option>
                                                <option value="الشرفية">الشرفية</option>
                                                <option value="المعذر">المعذر</option>
                                                <option value="الهدا">الهدا</option>
                                                <option value="صياح">صياح</option>
                                                <option value="الناصرية">الناصرية</option>
                                                <option value="العريجاء الأوسط">العريجاء الأوسط</option>
                                                <option value="الخزامي">الخزامي</option>
                                                <option value="السفارات">السفارات</option>
                                                <option value="وادي لبن">وادي لبن</option>
                                                <option value="العوالي">العوالي</option>
                                                <option value="ضاحية نمار">ضاحية نمار</option>
                                            </optgroup>
                                            <optgroup label="أحياء وسط الرياض">
                                                <option value="الضباط">الضباط</option>
                                                <option value="المربع">المربع</option>
                                                <option value="غبيرة">غبيرة</option>
                                                <option value="اليمامة">اليمامة</option>
                                                <option value="منفوحة الجديدة">منفوحة الجديدة</option>
                                                <option value="الشميسي">الشميسي</option>
                                                <option value="منفوحة">منفوحة</option>
                                                <option value="الوزارات">الوزارات</option>
                                                <option value="جرير">جرير</option>
                                                <option value="عتيقة">عتيقة</option>
                                                <option value="المنصورة">المنصورة</option>
                                                <option value="الربوة">الربوة</option>
                                                <option value="الزهراء">الزهراء</option>
                                                <option value="ام سليم">ام سليم</option>
                                                <option value="العمل">العمل</option>
                                                <option value="الصالحية">الصالحية</option>
                                                <option value="الخالدية">الخالدية</option>
                                                <option value="الوشام">الوشام</option>
                                                <option value="الديرة">الديرة</option>
                                                <option value="ثليم">ثليم</option>
                                                <option value="جبرة">جبرة</option>
                                                <option value="سكيرينة">سكيرينة</option>
                                                <option value="الفوطة">الفوطة</option>
                                                <option value="النموذجية">النموذجية</option>
                                                <option value="البطيحا">البطيحا</option>
                                                <option value="الدوبية">الدوبية</option>
                                                <option value="الصناعية">الصناعية</option>
                                                <option value="العود">العود</option>
                                                <option value="الفاروق">الفاروق</option>
                                                <option value="الفيصلية">الفيصلية</option>
                                            </optgroup>
                                            <optgroup label="أحياء شمال الرياض">
                                              <option value="الملقا">الملقا</option>
                                              <option value="النرجس">النرجس</option>
                                              <option value="العارض">العارض</option>
                                              <option value="الياسمين">الياسمين</option>
                                              <option value="الصحافة">الصحافة</option>
                                              <option value="العقيق">العقيق</option>
                                              <option value="القيروان">القيروان</option>
                                              <option value="العليا">العليا</option>
                                              <option value="حطين">حطين</option>
                                              <option value="السليمانية">السليمانية</option>
                                              <option value="المصيف">المصيف</option>
                                              <option value="التعاون">التعاون</option>
                                              <option value="الربيع">الربيع</option>
                                              <option value="الفلاح">الفلاح</option>
                                              <option value="الوادي">الوادي</option>
                                              <option value="النزهة">النزهة</option>
                                              <option value="الملك عبدالله">الملك عبدالله</option>
                                              <option value="الندى">الندى</option>
                                              <option value="الغدير">الغدير</option>
                                              <option value="الورود">الورود</option>
                                              <option value="الملك فهد">الملك فهد</option>
                                              <option value="المروج">المروج</option>
                                              <option value="النفل">النفل</option>
                                              <option value="الرحمانية">الرحمانية</option>
                                              <option value="المرسلات">المرسلات</option>
                                              <option value="النخيل">النخيل</option>
                                              <option value="الواحة">الواحة</option>
                                              <option value="المغرزات">المغرزات</option>
                                              <option value="المؤتمرات">المؤتمرات</option>
                                              <option value="المحمدية">المحمدية</option>
                                              <option value="الملك خالد الدولي">الملك خالد الدولي</option>
                                              <option value="صلاح الدين">صلاح الدين</option>
                                              <option value="المعذر الشمالي">المعذر الشمالي</option>
                                              <option value="بنبان">بنبان</option>
                                              <option value="جامعة الامام محمد بن سعود الاسلامية">جامعة الامام محمد بن سعود الاسلامية</option>
                                              <option value="جامعة الملك سعود">جامعة الملك سعود</option>
                                              <option value="جامعة الأميرة نورة">جامعة الأميرة نورة</option>
                                              <option value="مركز الملك عبدالله للدراسات والبحوث">مركز الملك عبدالله للدراسات والبحوث</option>
                                            </optgroup>
                                            <optgroup label="أحياء جنوب الرياض">
                                              <option value="العزيزية">العزيزية</option>
                                              <option value="الدار البيضاء">الدار البيضاء</option>
                                              <option value="بدر">بدر</option>
                                              <option value="عكاظ">عكاظ</option>
                                              <option value="الشفا">الشفا</option>
                                              <option value="أحد">أحد</option>
                                              <option value="السلي">السلي</option>
                                              <option value="المروة">المروة</option>
                                              <option value="المناخ">المناخ</option>
                                              <option value="الحائر">الحائر</option>
                                              <option value="طيبة">طيبة</option>
                                              <option value="البرية">البرية</option>
                                              <option value="المشاعل">المشاعل</option>
                                              <option value="المصانع">المصانع</option>
                                              <option value="الاسكان">الاسكان</option>
                                              <option value="الدفاع">الدفاع</option>
                                              <option value="المدينة الصناعية الجديدة">المدينة الصناعية الجديدة</option>
                                              <option value="هيت">هيت</option>
                                              <option value="عريض">عريض</option>
                                            </optgroup>

                                    </select>
                                </div>
                            </div>

                            <!-- المدينة -->
                            <div class="col-lg-2 my-1">
                                <div class="form-group mx-2 d-block">
                                    <label for="city" class="text-right w-100 my-1">المدينة</label>
                                    <select name="city" value="{{$Data["name"]}}" class="form-control text-right" style="min-width: 121px">
                                        <option disabled>الإختيار المحدد</option>
                                        <option value="{{$Data["city"]}}">{{$Data["city"]}}</option>
                                        <option disabled>الإختيارات المتاحة</option>
                                         <option value="الهفوف">الهفوف</option>
                                            <option value="ضباء">ضباء</option>
                                            <option value="عرعر">عرعر</option>
                                            <option value="الأحساء">الأحساء</option>
                                            <option value="المبرز">المبرز</option>
                                            <option value="الخرج">الخرج</option>
                                            <option value="الدمام">الدمام</option>
                                            <option value="الحوية">الحوية</option>
                                            <option value="الجبيل">الجبيل</option>
                                            <option value="الباحة">الباحة</option>
                                            <option value="الطائف">الطائف</option>
                                            <option value="تبوك">تبوك</option>
                                            <option value="القطيف">القطيف</option>
                                            <option value="جيزان">جيزان</option>
                                            <option value="الرس">الرس</option>
                                            <option value="تاروت">تاروت</option>
                                            <option value="الحوطة">الحوطة</option>
                                            <option value="شرورة">شرورة</option>
                                            <option value="الدوادمي">الدوادمي</option>
                                            <option value="الظهران">الظهران</option>
                                            <option value="عنيزة">عنيزة</option>
                                            <option value="سيهات">سيهات</option>
                                            <option value="بيش">بيش</option>
                                            <option value="بارق">بارق</option>
                                            <option value="الأفلاج">الأفلاج</option>
                                            <option value="سكاكا">سكاكا</option>
                                            <option value="الزلفى">الزلفى</option>
                                            <option value="الثقبة">الثقبة</option>
                                            <option value="الخبر">الخبر</option>
                                            <option value="نجران">نجران</option>
                                            <option value="بيشة">بيشة</option>
                                            <option value="بحرة">بحرة</option>
                                            <option value="الرياض">الرياض</option>
                                            <option value="جدة">جدة</option>
                                            <option value="المظليف">المظليف</option>
                                            <option value="القريات">القريات</option>
                                            <option value="صبياء">صبياء</option>
                                            <option value="الفريش">الفريش</option>
                                            <option value="ينبع البحر">ينبع البحر</option>
                                            <option value="أحد رفيدة">أحد رفيدة</option>
                                            <option value="حفر الباطن">حفر الباطن</option>
                                            <option value="خميس مشيط">خميس مشيط</option>
                                            <option value="المدينة المنورة">المدينة المنورة</option>
                                            <option value="وادي الدواسر">وادي الدواسر</option>

                                    </select>
                                </div>
                            </div>

                            <!-- الراتب  -->
                            <div class="col-lg-6">
                                <div class="form-group  mx-2 d-block">
                                    <label for="salary" class="text-right w-100 my-1">الراتب</label>
                                    <input name="salary" type="number" value="{{$Data["salary"]}}" class="form-control text-right" id="exampleInputEmail1" placeholder="الراتب">
                                </div>
                            </div>

                            <!-- تاريخ التعيين  -->
                            <div class="col-lg-6">
                                <div class="form-group  mx-2 d-block">
                                    <label for="dateOfJoin" class="text-right w-100 my-1">تاريخ التعيين</label>
                                    <input name="dateOfJoin" type="date" value="{{$Data["dateOfJoin"]}}" class="form-control text-right" id="exampleInputEmail1" placeholder="تاريخ التعيين">
                                </div>
                            </div>



                             <!-- الوظيفة / الصلاحية -->
                             <div class="col-lg-6 my-1">
                                <div class="form-group  mx-2 d-block">
                                    <label for="perPage" class="text-right w-100 my-1">الوظيفة / الصلاحية</label>
                                    <select class="form-control text-right" name="role" id="">
                                        <option disabled>الإختيار المحدد</option>
                                        <option value="{{$Data["role"]}}">{{$Data["role"]}}</option>
                                        <option disabled>الإختيارات المتاحة</option>
                                        @foreach ($roles as $role)

                                        <option value="{{$role}}">{{$role}}</option>
                                        @endforeach
                                    </select>
                                  </div>
                              </div>

                        </div>


                    </div>

                    <div class="card-footer text-right">
                        <div class="d-flex justify-content-between  align-items-center">
                            بيانات الموظف التى تمكنه من الدخول للوحة التحكم
                            <button  type="submit" class="btn btn-success">تعديل موظف</button>

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
        $('#new-user').validate({
            rules: {
                name : {
                    required: true,
                },
                phone : {
                    required: true,
                    minlength: 12,
                    maxlength: 12,
                },
                phoneTwo : {
                    required: true,
                    minlength: 12,
                    maxlength: 12,
                },
                address : {
                    required: true,
                },
                district : {
                    required: true,
                },
                city : {
                    required: true,
                },
                salary : {
                    required: true,
                },
                dateOfJoin : {
                    required: true,
                },
                username : {
                    required: true,
                    pattern: /^[a-zA-Z]+$/,
                },
                role : {
                    required: true,
                },

            },
            messages: {
                name : {
                    required: "إسم الموظف مطلوب",
                },
                phone : {
                    required: "رقم تليفون الموظف مطلوب",
                    minlength: "أدخل رقم التليفون من 12 رقم",
                    maxlength: "أدخل رقم التليفون من 12 رقم",

                },

                phoneTwo : {
                    required: "رقم تليفون أخر للموظف مطلوب",
                    minlength: "أدخل رقم التليفون من 12 رقم",
                    maxlength: "أدخل رقم التليفون من 12 رقم",

                },
                address : {
                    required: "العنوان مطلوب",
                },
                district : {
                    required: "الحى مطلوب",
                },
                city : {
                    required: "المدينة مطلوبة",
                },
                salary : {
                    required: "راتب الموظف مطلوب",
                },

                dateOfJoin : {
                    required: "تاريخ التعيين مطلوب",
                },
                username : {
                    required: "إسم المستخدم",
                    pattern: "إسم الموظف بالإنجليزية فقط بدون مسافات",
                },
                role : {
                    required: "الصلاحية والوظيفة السر مطلوبة",
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
