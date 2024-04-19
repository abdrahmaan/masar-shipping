
<!DOCTYPE html>
<!--
Template Name: NobleUI - HTML Bootstrap 5 Admin Dashboard Template
Author: NobleUI
Website: https://www.nobleui.com
Portfolio: https://themeforest.net/user/nobleui/portfolio
Contact: nobleui123@gmail.com
Purchase: https://1.envato.market/nobleui_admin
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="ar" dir="rtl">

<!-- Mirrored from www.nobleui.com/html/template/demo1-rtl/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Feb 2024 13:45:57 GMT -->
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
	<meta name="author" content="NobleUI">
	<meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<title>تسجيل الدخول - أطلس الذهبية</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400&display=swap" rel="stylesheet">
  <!-- End fonts -->

	<!-- core:css -->
	<link rel="stylesheet" href="{{asset('assets/vendors/core/core.css')}}">
	<!-- endinject -->

	<!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{asset('assets/vendors/flatpickr/flatpickr.min.css')}}">
	<!-- End plugin css for this page -->

	<!-- inject:css -->
	<link rel="stylesheet" href="{{asset('assets/fonts/feather-font/css/iconfont.css')}}">
	<link rel="stylesheet" href="{{asset('assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
	<!-- endinject -->

  <!-- Layout styles -->  
	<link rel="stylesheet" href="{{asset('assets/css/demo1/style-rtl.min.css')}}">
  <!-- End layout styles -->
    <!-- Toastr -->
    <link rel="stylesheet" href="{{asset('assets/vendors/toastr/toastr.min.css')}}">

    <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('assets/vendors/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/vendors/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/vendors/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" />
</head>
<body>

    <div class="main-wrapper">
		<div class="page-wrapper full-page">
			<div class="page-content d-flex align-items-center justify-content-center">

				<div class="row w-100 mx-0 auth-page">
					<div class="col-md-8 col-xl-6 mx-auto">
						<div class="card">
							<div class="row">
                <div class="col-md-4 pe-md-0">
                  <div class="auth-side-wrapper">

                  </div>
                </div>
                <div class="col-md-8 ps-md-0">
                  <div class="auth-form-wrapper px-4 py-5">
                    <a href="#" class="noble-ui-logo d-block mb-2">Atlas<span>Golden</span></a>
                    <h5 class="text-muted fw-normal mb-4">مرحباً بعودتك ، سجل دخول لحسابك</h5>
                    <form id="login" action="/login" method="POST" class="forms-sample">
                      <div class="mb-3 form-group">
                        @csrf
                        <label for="userEmail" class="form-label">إسم المستخدم</label>
                        <input type="text" name="username" class="form-control" id="userEmail" placeholder="إسم المستخدم">
                      </div>
                      <div class="mb-3 form-group">
                        <label for="userPassword" class="form-label">كلمة السر</label>
                        <input type="password" name="password" class="form-control" id="userPassword" autocomplete="current-password" placeholder="كلمة السر">
                      </div>
                      
                      <div>
                        <button  type="submit" class="btn btn-primary me-2 mb-2 mb-md-0 text-white">تسجيل دخول</button>
                       
                      </div>
                    </form>
                  </div>
                </div>
              </div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	<!-- core:js -->
	<script src="{{asset('assets/vendors/core/core.js')}}"></script>
	<!-- endinject -->

	<!-- Plugin js for this page -->
  <script src="{{asset('assets/vendors/jquery-validation/jquery.validate.min.js')}}"></script>
  <script src="{{asset('assets/vendors/flatpickr/flatpickr.min.js')}}"></script>
  <script src="{{asset('assets/vendors/apexcharts/apexcharts.min.js')}}"></script>
	<!-- End plugin js for this page -->



	<!-- inject:js -->
	<script src="{{asset('assets/vendors/feather-icons/feather.min.js')}}"></script>
	<script src="{{asset('assets/js/template.js')}}"></script>
	<!-- endinject -->

    <!-- Toastr -->
  <script src="{{asset('assets/vendors/toastr/toastr.min.js')}}"></script>

  <!-- Datatables -->
  <!-- DataTables  & Plugins -->
<script src="{{asset('assets/vendors/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/vendors/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/vendors/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/vendors/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/vendors/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/vendors/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/vendors/jszip/jszip.min.js')}}"></script>
<script src="{{asset('assets/vendors/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/vendors/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/vendors/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/vendors/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/vendors/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
	<!-- Custom js for this page -->
  <script src="{{asset('assets/js/dashboard-light.js')}}"></script>
	<!-- End custom js for this page -->
    <script>
        $(function () {
            $('#login').validate({
                rules: {
                    username : {
                        required: true,
                        pattern: /^[a-zA-Z]+$/,
                    },
                    password : {
                        required: true,
                        minlength: 6
                    },
                },
                messages: {
    
                    username : {
                        required: "إسم المستخدم مطلوب",
                        pattern: "إسم المستخدم بالإنجليزية فقط بدون مسافات",
                    },
                    password : {
                        required: "كلمة السر مطلوبة",
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
    
        {{-- ********* Success Message ********** --}}
        @if(session()->has('message'))
            <script>
                toastr.success("{{session('message')}}");
                toastr.options.closeDuration = 5000;
            </script>
        @endif
    
        {{-- ********* Error Message ********** --}}
        @if(session()->has('error'))
            <script>
                toastr.error("{{session('error')}}");
                toastr.options.closeDuration = 5000;
            </script>
        @endif
</body>

<!-- Mirrored from www.nobleui.com/html/template/demo1-rtl/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Feb 2024 13:46:16 GMT -->
</html>    