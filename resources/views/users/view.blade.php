@extends('layout.master')
@section('title', 'بحث العملاء الموظفين')
@php
    $permissions = session()->get('permissions');

@endphp

@section('content')

    <div>
        <h4 class="mb-4">بحث فى الموظفين</h4>
    </div>


    <div class="row">


        <div class="col-12">
            <form id="new-car" action="/employees" method="GET">
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

                                <!-- رقم الملف -->
                                <div class="col-lg-3 my-1">
                                    <div class="form-group  mx-2 d-block">
                                        <label for="id" class="text-right w-100 my-1">رقم الملف</label>
                                        <input name="id" type="number" class="form-control text-right"
                                            id="exampleInputEmail1" placeholder="رقم الملف">
                                    </div>
                                </div>
                                <!-- الإسم -->
                                <div class="col-lg-3 my-1">
                                    <div class="form-group  mx-2 d-block">
                                        <label for="name" class="text-right w-100 my-1">إسم الموظف</label>
                                        <input name="name" type="text" class="form-control text-right"
                                            id="exampleInputEmail1" placeholder="إسم الموظف">
                                    </div>
                                </div>
                                <!-- رقم التليفون -->
                                <div class="col-lg-3 my-1">
                                    <div class="form-group  mx-2 d-block">
                                        <label for="phone" class="text-right w-100 my-1">رقم التليفون</label>
                                        <input name="phone" type="number" class="form-control text-right"
                                            id="exampleInputEmail1" placeholder="رقم التليفون">
                                    </div>
                                </div>
                                <!-- الوظيفة / الصلاحية -->
                                <div class="col-lg-3 my-1">
                                    <div class="form-group  mx-2 d-block">
                                        <label for="role" class="text-right w-100 my-1">الوظيفة / الصلاحية</label>
                                        <select class="form-control text-right" name="role" id="">
                                            <option value="الكل">الكل</option>
                                            <option value="Admin">Admin</option>
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
                    <h3 class="card-title m-0">بيانات الموظفين</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body overflow-auto">
                    <table id="cars-table" class="table table-bordered table-striped">
                        <div class="col-12"></div>
                        <thead>
                            <tr>


                                <th>رقم الملف</th>
                                <th>الإسم</th>
                                <th>رقم التليفون</th>
                                <th>رقم تليفون أخر</th>
                                <th>العنوان</th>
                                <th>الحى</th>
                                <th>المدينة</th>
                                <th>الوظيفة</th>
                                <th>الراتب</th>
                                <th>تاريخ التعيين</th>
                                <th>إسم المستخدم</th>
                                <th>التغييرات</th>

                            </tr>
                        </thead>
                        <tbody>
                            {{-- table body data --}}

                            @foreach ($Data as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->phone }}</td>
                                    <td>{{ $row->phoneTwo }}</td>
                                    <td>{{ $row->address }}</td>
                                    <td>{{ $row->district }}</td>
                                    <td>{{ $row->city }}</td>
                                    <td>{{ $row->role }}</td>
                                    <td>{{ $row->salary }}</td>
                                    <td>{{ $row->dateOfJoin }}</td>
                                    <td>{{ $row->username }}</td>
                                    <td>
                                        @if (in_array('edit-employees', $permissions))
                                            <a href="/employees/edit/{{ $row->id }}" class="btn btn-success">تعديل</a>
                                        @endif
                                        @if (in_array('reset-password-employees', $permissions))
                                            <a href="/reset-password-employees/{{ $row->id }}"
                                                onclick="confirmReset(event)" class="btn btn-primary">تعيين كلمة السر</a>
                                        @endif
                                        @if (in_array('delete-employees', $permissions))
                                            <a href="/delete-employees/{{ $row->id }}" onclick="confirmDelete(event)"
                                                class="btn btn-danger">حذف</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>رقم الملف</th>
                                <th>الإسم</th>
                                <th>رقم التليفون</th>
                                <th>رقم تليفون أخر</th>
                                <th>العنوان</th>
                                <th>الحى</th>
                                <th>المدينة</th>
                                <th>الوظيفة</th>
                                <th>الراتب</th>
                                <th>تاريخ التعيين</th>
                                <th>إسم المستخدم</th>
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

        function confirmReset(e) {
            e.preventDefault();
            Swal.fire({
                title: "هل أنت متأكد?",
                text: "سيتم إعادة تعيين كلمة السر!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "نعم, غير كلمة السر !",
                cancelButtonText: "إلغاء"
            }).then((result) => {
                if (result.isConfirmed) {

                    window.location.href = e.target.href;
                }
                if (result.isDismissed) {

                    Swal.fire({
                        title: "بياناتك بـ أمان !",
                        text: "تم إلغاء عملية إعادة تعيين كلمة السر",
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
