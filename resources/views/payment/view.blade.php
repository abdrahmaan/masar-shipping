@extends('layout.master')
@section('title',"بحث الدفعات مالية")

@php
    $permissions = session()->get('permissions');

@endphp
@section('content')

<div>
    <h4 class="mb-4">بحث فى الدفعات المالية</h4>
</div>

<div class="row">


    <div class="col-12">
        <form id="new-car" action="/clients-payments" method="GET">
            <!-- بيانات البحث -->
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
                              <!-- الإسم -->
                              <div class="col-lg-4 my-1">
                                <div class="form-group  mx-2 d-block">
                                    <label for="clientName" class="text-right w-100 my-1">إسم العميل</label>
                                    <input name="clientName" type="text" class="form-control text-right" id="exampleInputEmail1" placeholder="إسم العميل">
                                </div>
                              </div>

                              <!-- رقم الملف -->
                            <div class="col-lg-4 my-1">
                              <div class="form-group  mx-2 d-block">
                                  <label for="client_id" class="text-right w-100 my-1">رقم الملف</label>
                                  <input name="client_id" type="number" class="form-control text-right" id="exampleInputEmail1" placeholder="رقم الملف">
                              </div>
                            </div>

                              <!-- رقم العقد -->
                              <div class="col-lg-4 my-1">
                                <div class="form-group  mx-2 d-block">
                                    <label for="contract_id" class="text-right w-100 my-1">رقم العقد</label>
                                    <input name="contract_id" type="number" class="form-control text-right" id="exampleInputEmail1" placeholder="رقم العقد">
                                </div>
                              </div>
                                 <!-- نوع القيد  -->
                                 <div class="col-lg-3 my-1">
                                  <div class="form-group  mx-2 d-block">
                                      <label for="paymentType" class="text-right w-100 my-1">نوع القيد</label>
                                      <select class="form-control text-right" name="paymentType" id="">
                                          <option value="الكل">الكل</option>
                                          <option value="debit">مدين</option>
                                          <option value="credit">دائن</option>
                                      </select>
                                  </div>
                              </div>
                                   <!-- نوع المعاملة  -->
                                <div class="col-lg-3 my-1">
                                  <div class="form-group  mx-2 d-block">
                                      <label for="transactionType" class="text-right w-100 my-1">نوع المعاملة</label>
                                      <select class="form-control text-right" name="transactionType" id="">
                                        <option value="الكل">الكل</option>
                                          <option value="دفعة جديدة">دفعة جديدة</option>
                                          <option value="إسترجاع">إسترجاع</option>
                                          <option value="إلغاء">إلغاء</option>
                                      </select>
                                  </div>
                              </div>

                              <!-- تاريخ البداية -->
                              <div class="col-lg-3 my-1">
                                <div class="form-group  mx-2 d-block">
                                    <label for="sDate" class="text-right w-100 my-1">تاريخ البداية</label>
                                    <input name="sDate" type="date" class="form-control text-right" id="exampleInputEmail1" placeholder="رقم الهوية">
                                </div>
                              </div>
                              <!-- تاريخ النهاية -->
                              <div class="col-lg-3 my-1">
                                <div class="form-group  mx-2 d-block">
                                    <label for="eDate" class="text-right w-100 my-1">تاريخ النهاية</label>
                                    <input name="eDate" type="date" class="form-control text-right" id="exampleInputEmail1" placeholder="رقم الهوية">
                                </div>
                              </div>


                              <!-- عدد النتائج -->
                              <div class="col-lg-4 my-1">
                                <div class="form-group  mx-2 d-block">
                                    <label for="perPage" class="text-right w-100 my-1">عدد النتائج/الصفحة</label>
                                    <select class="form-control" name="perPage" id="">
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="30">30</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                        <option value="1000">1000</option>
                                    </select>
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
            <div class="card-header d-flex align-items-center justify-content-between">
              <h3 class="card-title m-0">بيانات الدفعات</h3>
              @if ($balance > 0)

                  <h4 class="badge fs-5 bg-success">الرصيد : {{number_format($balance)}} ر.س</h4>

                @else

                 <h4 class="badge fs-5 bg-danger">الرصيد : {{number_format($balance)}} ر.س</h4>

              @endif
            </div>
            <!-- /.card-header -->
            <div class="card-body overflow-auto">
              <table id="cars-table" class="table table-bordered table-striped">
                <div class="col-12"></div>
                <thead>
                <tr>

                  <th>رقم الملف</th>
                  <th>الإسم</th>
                  <th>القيمة</th>
                  <th>نوع القيد</th>
                  <th>نوع العملية</th>
                  <th>رقم العقد</th>
                  <th>ملاحظات</th>
                  <th>تاريخ السداد</th>
                  <th>الموظف</th>
                 <th>التغييرات</th>



                </tr>
                </thead>
                <tbody>
                    {{-- table body data --}}

                    @foreach ($Data as $row)
                        <tr>
                          <td>{{$row->client_id}}</td>
                           <td>
                             <a  href="/profile/{{$row->client_id}}">{{$row->clientName}}</a>
                            </td>
                            <td>{{number_format($row->amount)}} ر.س</td>
                            <td>{{$row->paymentType == "debit" ? "مدين" : "دائن"}}</td>
                            <td>{{$row->transactionType}}</td>
                            <td>{{$row->contract_id}}</td>
                           <td>{{$row->description}}</td>
                           <td>{{$row->dateOfPay}}</td>
                           <td>{{$row->op}}</td>
                           <td>
                            @if (in_array("delete-payments",$permissions))

                            <a href="/delete-payment/{{$row->id}}" onclick="confirmDelete(event)" id="btnInfo" class="btn btn-danger">حذف</a>
                            @endif

                          </td>

                        </tr>
                    @endforeach

                </tbody>
                <tfoot>
                    <tr>
                      <th>رقم الملف</th>
                      <th>الإسم</th>
                      <th>القيمة</th>
                      <th>نوع القيد</th>
                      <th>نوع العملية</th>
                      <th>رقم العقد</th>
                      <th>ملاحظات</th>
                      <th>تاريخ السداد</th>
                      <th>الموظف</th>
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

      {{-- <script>
        // Get all date inputs
        const dateInputs = document.querySelectorAll('input[type="date"]');

        // Get today's date
        const today = new Date();
        const year = today.getFullYear();
        const month = String(today.getMonth() + 1).padStart(2, '0');
        const day = String(today.getDate()).padStart(2, '0');
        const formattedDate = `${year}-${month}-${day}`;

        // Set value of each date input to today's date
        dateInputs.forEach(input => {
            input.value = formattedDate;
        });
    </script> --}}


  <script>
    function confirmDelete(e) {
      e.preventDefault();
      Swal.fire({
          title: "هل أنت متأكد?",
          text: "لن تسطيع إستعادة البيانات!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "نعم, إحذف !",
          cancelButtonText: "إلغاء"
        }).then((result) => {
          if (result.isConfirmed) {

            window.location.href = e.target.href;
          }
          if (result.isDismissed) {

            Swal.fire({
              title: "بياناتك بـ أمان !",
              text: "تم إلغاء عملية الحذف",
              icon: "warning",
              confirmButtonText: "إخفاء",
              confirmButtonColor: "#d33",

            });
          }

        });

    }
  </script>
@endsection
