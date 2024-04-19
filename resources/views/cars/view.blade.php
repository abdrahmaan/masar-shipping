@extends('layout.master')
@section('title',"بحث سيارات")
    

@section('content')

<div>
    <h4 class="mb-4">بحث فى السيارات</h4>
</div>


<div class="row">

        
    <div class="col-12">
        <form id="new-car" action="/cars" method="GET">
            <!-- بيانات السيارة -->
            <div class="card my-3">
                <div class="card-header d-flex align-items-center">   
                    <h3 class="card-title m-0">بيانات البحث</h3>
                    <div class="card-tools mx-3">
                        <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#car-data" aria-expanded="true" aria-controls="car-data">
                            <i data-feather="plus"></i>
                        </button>
                        
                    </div>
                </div>
                <div class="collapse show" id="car-data">
                    <div class="card-body">
                        <div class="row justify-content-start">
                            <!-- CC مدى الـ -->
                                <div class="col-lg-3 my-1">
                                    <div class="form-group mx-2 d-block">
                                        <label for="CCType" class="text-right w-100 my-1">CC مدى الـ</label>
                                        <select name="CCType" class="form-control text-right" style="">
                                            <option value="All">الكل</option>
                                            <option value="Greater">أكبر من</option>
                                            <option value="Lower">أصغر من</option>
                                            <option value="Same">نفس القيمة</option>
                                        </select>
                                    </div>
                                </div>
  
                              <!-- CC قيمة الـ  -->
                            <div class="col-lg-3 my-1">
                              <div class="form-group  mx-2 d-block">
                                  <label for="CC" class="text-right w-100 my-1">CC قيمة الـ</label>
                                  <input name="CC" type="number" class="form-control text-right" id="exampleInputEmail1" placeholder="CC">
                              </div>
                            </div>
                            <!--  مدى قوة الحصان -->
                                <div class="col-lg-3 my-1">
                                    <div class="form-group mx-2 d-block">
                                        <label for="HorsePowerType" class="text-right w-100 my-1">مدى قوة الحصان </label>
                                        <select name="HorsePowerType" class="form-control text-right" style="">
                                            <option value="All">الكل</option>
                                            <option value="Greater">أكبر من</option>
                                            <option value="Lower">أصغر من</option>
                                            <option value="Same">نفس القيمة</option>
                                        </select>
                                    </div>
                                </div>
  
                              <!--  قيمة قوة الحصان  -->
                            <div class="col-lg-3 my-1">
                              <div class="form-group  mx-2 d-block">
                                  <label for="HorsePower" class="text-right w-100 my-1">قوة الحصان</label>
                                  <input name="HorsePower" type="number" class="form-control text-right" id="exampleInputEmail1" placeholder="قوة الحصان">
                              </div>
                            </div>
                            <!-- تصنيف السيارة -->
  
                              <div class="col-lg-3 my-1">
                                <div class="form-group mx-2 d-block">
                                        <label for="Category" class="text-right w-100 my-1">تصنيف السيارة</label>
                                        <select name="Category" class="form-control text-right" style="min-width: 121px">
                                            <option value="الكل">الكل</option>
                                            <option value="Jeep">Jeep</option>
                                            <option value="Sedan">Sedan</option>
                                            <option value="Pickup">Pickup</option>
                                            <option value="VAN">VAN</option>
                                            <option value="Bus">Bus</option>
                                            <option value="Passengers">Passengers</option>
                                        </select>
                                    </div>
                            </div>
  
                            <!-- سنة الصنع  -->
                            <div class="col-lg-3 my-1">
                                <div class="form-group  mx-2 d-block">
                                    <label for="ModelYear" class="text-right w-100 my-1">سنة الصنع</label>
                                    <input name="ModelYear" type="number" class="form-control text-right" id="exampleInputEmail1" placeholder="سنة الصنع">
                                </div>
                            </div>
                                          
                      </div>
                      
                
                    </div>
                    <div class="card-footer text-right">
                      <div class="d-flex flex-row-reverse justify-content-between align-items-center">
                          <button  type="submit" class="btn btn-success w-25">بحث</button>
                          بيانات خاصة بالبحث
                      </div>
  
                    </div>
  
                </div>

            </div>


        </form>

    </div>


</div>

<div class="row">
    <div class="col-12">
 
        <div class="card">
            <div class="card-header d-flex align-items-center">
              <h3 class="card-title m-0">بيانات السيارات</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body overflow-auto">
              <table id="cars-table" class="table table-bordered table-striped">
                <div class="col-12"></div>
                <thead>
                <tr>
                  <th>الماركة</th>
                  <th>التصنيف</th>
                  <th>إسم الموديل</th>
                  <th>نوع الموديل</th>
                  <th>سنة الصنع</th>
                  <th>نوع الإنتقال</th>
                  <th>عدد الإنتقالات</th>
                  <th>4X4/4X2</th>
                  <th>CC</th>
                  <th>عدد السليندر</th>
                  <th>قوة الحصان</th>
                  <th>نوع التانك</th>
                  <th>عدد الليترات/تانك </th>
                  <th>الطول</th>
                  <th>العرض</th>
                  <th>الإرتفاع</th>
                  <th>مقاس الكاوتش</th>
                  <th>عدد الركاب</th>
                  <th>سعر الشراء</th>
                  <th>التغييرات</th>
             
                </tr>
                </thead>
                <tbody>
                    {{-- table body data --}}

                    @foreach ($Data as $row)
                        <tr>
                            <td>{{$row->Brand}}</td>
                            <td>{{$row->Category}}</td>
                            <td>{{$row->ModelName}}</td>
                            <td>{{$row->ModelType}}</td>
                            <td>{{$row->ModelYear}}</td>
                            <td>{{$row->Transmission}}</td>
                            <td>{{$row->TransmissionCount}}</td>
                            <td>{{$row->FourXFour}}</td>
                            <td>{{$row->CC}}</td>
                            <td>{{$row->Cylinder}}</td>
                            <td>{{$row->HorsePower}}</td>
                            <td>{{$row->FuelType}}</td>
                            <td>{{$row->FuelLiter}}</td>
                            <td>{{$row->Height}}</td>
                            <td>{{$row->Width}}</td>
                            <td>{{$row->Length}}</td>
                            <td>{{$row->Tier}}</td>
                            <td>{{$row->Passengers}}</td>
                            <td>{{$row->PurchasePrice}}</td>
                            <td>
                                <a href="/edit-car/{{$row->id}}" class="btn btn-success">تعديل</a>
                                <a href="/delete-car/{{$row->id}}" class="btn btn-danger">حذف</a>
                            </td>
                        </tr>
                    @endforeach
                 
                </tbody>
                <tfoot>
                    <tr>
                        <th>الماركة</th>
                        <th>التصنيف</th>
                        <th>إسم الموديل</th>
                        <th>نوع الموديل</th>
                        <th>سنة الصنع</th>
                        <th>نوع الإنتقال</th>
                        <th>عدد الإنتقالات</th>
                        <th>4X4/4X2</th>
                        <th>CC</th>
                        <th>عدد السليندر</th>
                        <th>قوة الحصان</th>
                        <th>نوع التانك</th>
                        <th>عدد الليترات/تانك </th>
                        <th>الطول</th>
                        <th>العرض</th>
                        <th>الإرتفاع</th>
                        <th>مقاس الكاوتش</th>
                        <th>عدد الركاب</th>
                        <th>سعر الشراء</th>
                         <th>التغييرات</th>
                        
                      </tr>
                </tfoot>
              </table>
              <div class="hello my-2">
                Showing {{ $Data->firstItem() }} to {{ $Data->lastItem() }} of {{ $Data->total() }} enteris
                {{ $Data->links() }}
              </div>
            </div>
            <!-- /.card-body -->
          </div>
    </div>
</div>
@endsection


@section('script')

<script>

    $(function () {
      $("#cars-table").DataTable({
        "bInfo" : false,
        "paging": false,
        "responsive": true, "lengthChange": true, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
          }).buttons().container().appendTo('#cars-table_wrapper .col-md-6:eq(0)');

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