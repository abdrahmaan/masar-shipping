
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

	<title>@yield('title') - أطلس الذهبية</title>

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
    {{-- Sweet Alert CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.6/dist/sweetalert2.min.css" rel="stylesheet">

    <style>

        .sidebar .sidebar-body::-webkit-scrollbar {
          width: 2px; /* width of the scrollbar */
        }

        .sidebar .sidebar-body::-webkit-scrollbar-track {
          background: #ffffff; /* color of the track */
        }

        .sidebar .sidebar-body::-webkit-scrollbar-thumb {
          background: #6571ff; /* color of the thumb */
        }
    </style>

  @yield('css')
</head>
<body style="">
	<div class="main-wrapper" style="max-height: calc(100vh - 18.375px)">



		<!-- partial -->

		<div class="page-wrapper mx-auto">



			<div class="page-content d-flex flex-column justify-content-center align-items-center">

                    @yield('content')

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
{{-- Sweet Alert JS --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.6/dist/sweetalert2.all.min.js"></script>
	<!-- Custom js for this page -->
  <script src="{{asset('assets/js/dashboard-light.js')}}"></script>
	<!-- End custom js for this page -->
  @yield('script')
  {{-- Sidebar Color Handle Script --}}
 <script>

  // This code will be executed when the entire page has finished loading
  window.addEventListener('load', function() {
          let SidebarButtons = document.querySelectorAll(".nav-item");
          let pagePath = window.location.pathname;
    console.log(SidebarButtons);
          SidebarButtons.forEach(link => {
              link.classList.remove("active");

              if (pagePath.includes(link.dataset.url)) {
                  link.classList.add("active");
              }

          });

        });
</script>
</body>

<!-- Mirrored from www.nobleui.com/html/template/demo1-rtl/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Feb 2024 13:46:16 GMT -->
</html>
