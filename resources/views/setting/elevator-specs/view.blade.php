@extends('layout.master')
@section('title', 'بحث مواصفات المصعد')

@php
    $permissions = session()->get('permissions');

@endphp

@section('content')

    <div>
        <h4 class="mb-4">بحث فى مواصفات المصعد</h4>
    </div>


    <div class="row">


        <div class="col-12">
            <form id="new-car" action="/elevator-specifications" method="GET">
                <!-- بيانات البحث -->
                <div class="card my-3">
                    <div class="card-header d-flex align-items-center">
                        <h3 class="card-title m-0">بيانات البحث</h3>
                        <div class="card-tools mx-3">
                            <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#car-data"
                                aria-expanded="true" aria-controls="car-data">
                                <i data-feather="plus"></i>
                            </button>

                        </div>
                    </div>
                    <div class="collapse show" id="car-data">
                        <div class="card-body">
                            <div class="row justify-content-start">


                                <!-- النوع -->
                                <div class="col-lg-3 my-1">
                                    <div class="form-group mx-2 d-block">
                                        <label for="type" class="text-right w-100 my-1">مواصفات المصعد</label>
                                        <select name="type" class="form-control text-right" style="min-width: 121px">
                                            <option value="الكل">الكل</option>
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
                                <!-- النوع -->
                                <div class="col-lg-3 my-1">
                                    <div class="form-group mx-2 d-block">
                                        <label for="status" class="text-right w-100 my-1">الحالة</label>
                                        <select name="status" class="form-control text-right" style="min-width: 121px">
                                            <option value="الكل">الكل</option>
                                            <option value="active">مفعل</option>
                                            <option value="disabled">معطل</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- عدد النتائج -->
                                <div class="col-lg-3 my-1">
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
                                <button type="submit" class="btn btn-success w-25">بحث</button>
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
                    <h3 class="card-title m-0">بيانات مواصفات المصعد</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body overflow-auto">
                    <table id="cars-table" class="table table-bordered table-striped">
                        <div class="col-12"></div>
                        <thead>
                            <tr>

                                <th>المواصفات</th>
                                <th>القيمة</th>
                                <th>الحالة</th>
                                <th>التغييرات</th>

                            </tr>
                        </thead>
                        <tbody>
                            {{-- table body data --}}

                            @foreach ($Data as $row)
                                <tr>

                                    <td>{{ $row->type }}</td>
                                    <td>{{ $row->value }}</td>
                                    @if ($row->status == 'active')
                                        <td class="text-center">
                                            <span class="badge bg-success">مفعل</span>
                                        </td>
                                    @else
                                        <td class="text-center">
                                            <span class="badge bg-danger">معطل</span>
                                        </td>
                                    @endif
                                    <td class="text-center">
                                        @if (in_array('trigger-elevator-specs-status', $permissions))
                                            @if ($row->status == 'active')
                                                <a href="/elevator-specifications/status/{{ $row->id }}"
                                                    onclick="confirmStatus(event)" class="btn btn-danger">تعطيل</a>
                                            @else
                                                <a href="/elevator-specifications/status/{{ $row->id }}"
                                                    onclick="confirmStatus(event)" class="btn btn-success">تفعيل</a>
                                            @endif
                                        @endif
                                        @if (in_array('delete-elevator-specs', $permissions))
                                            <a href="/delete-elevator-specifications/{{ $row->id }}"
                                                onclick="confirmDelete(event)" class="btn btn-danger">حذف</a>
                                        @endif

                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>

                                <th>المواصفات</th>
                                <th>القيمة</th>
                                <th>الحالة</th>
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
        $(function() {
            $("#cars-table").DataTable({
                "bInfo": false,
                "paging": false,
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#cars-table_wrapper .col-md-6:eq(0)');

        });
    </script>

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

        function confirmStatus(e) {
            e.preventDefault();
            Swal.fire({
                title: "متأكد من تغيير الحالة؟",
                text: "كن متأكد من تغيير الحالة قبل الموافقة !",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "نعم, غير الحالة !",
                cancelButtonText: "إلغاء"
            }).then((result) => {
                if (result.isConfirmed) {

                    window.location.href = e.target.href;
                }
                if (result.isDismissed) {

                    Swal.fire({
                        title: "بياناتك بـ أمان !",
                        text: "تم إلغاء العملية",
                        icon: "warning",
                        confirmButtonText: "إخفاء",
                        confirmButtonColor: "#d33",

                    });
                }

            });

        }
    </script>

    {{-- *********** Errors ************* --}}
    @if ($errors->any())
        <script>
            @foreach ($errors->all() as $error)
                toastr.error('{{ $error }}');
                toastr.options.closeDuration = 5000;
            @endforeach
        </script>
    @endif

    {{-- ********* Error Message ********** --}}
    @if (session()->has('error'))
        <script>
            toastr.error("{{ session('error') }}");
            toastr.options.closeDuration = 5000;
        </script>
    @endif

    {{-- ********* Success Message ********** --}}
    @if (session()->has('message'))
        <script>
            toastr.success("{{ session('message') }}");
            toastr.options.closeDuration = 5000;
        </script>
    @endif

@endsection