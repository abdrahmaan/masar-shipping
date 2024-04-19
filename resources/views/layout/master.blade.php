
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
<body>
	<div class="main-wrapper">

		<!-- partial:partials/_sidebar.html -->
		@extends('layout.sidebar')

    <nav class="settings-sidebar">
      <div class="sidebar-body">
        <a href="#" class="settings-sidebar-toggler">
          <i data-feather="settings"></i>
        </a>
        <h6 class="text-muted mb-2">Sidebar:</h6>
        <div class="mb-3 pb-3 border-bottom">
          <div class="form-check form-check-inline">
            <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarLight" value="sidebar-light" checked>
            <label class="form-check-label" for="sidebarLight">
              Light
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarDark" value="sidebar-dark">
            <label class="form-check-label" for="sidebarDark">
              Dark
            </label>
          </div>
        </div>
        <div class="theme-wrapper">
          <h6 class="text-muted mb-2">Light Theme:</h6>
          <a class="theme-item active" href="dashboard.html">
            <img src="{{asset('assets/images/screenshots/light.jpg')}}" alt="light theme">
          </a>
          <h6 class="text-muted mb-2">Dark Theme:</h6>
          <a class="theme-item" href="https://www.nobleui.com/html/template/demo2-rtl/dashboard.html">
            <img src="{{asset('assets/images/screenshots/dark.jpg')}}" alt="light theme">
          </a>
        </div>
      </div>
    </nav>
		<!-- partial -->

		<div class="page-wrapper">

			<!-- partial:partials/_navbar.html -->
			<nav class="navbar">
				<a href="#" class="sidebar-toggler">
					<i data-feather="menu"></i>
				</a>
				<div class="navbar-content">
					<form class="search-for d-none">
						<div class="input-group">
              <div class="input-group-text">
                <i data-feather="search"></i>
              </div>
							<input type="text" class="form-control" id="navbarForm" placeholder="Search here...">
						</div>
					</form>
					<ul class="navbar-nav">
						<li class="nav-item dropdown d-none">
							<a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="flag-icon flag-icon-us mt-1" title="us"></i> <span class="ms-1 me-1 d-none d-md-inline-block">English</span>
							</a>
							<div class="dropdown-menu" aria-labelledby="languageDropdown">
                <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-us" title="us" id="us"></i> <span class="ms-1"> English </span></a>
                <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-fr" title="fr" id="fr"></i> <span class="ms-1"> French </span></a>
                <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-de" title="de" id="de"></i> <span class="ms-1"> German </span></a>
                <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-pt" title="pt" id="pt"></i> <span class="ms-1"> Portuguese </span></a>
                <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-es" title="es" id="es"></i> <span class="ms-1"> Spanish </span></a>
							</div>
            </li>
						<li class="nav-item dropdown d-none">
							<a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i data-feather="grid"></i>
							</a>
							<div class="dropdown-menu p-0" aria-labelledby="appsDropdown">
                <div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">
									<p class="mb-0 fw-bold">Web Apps</p>
									<a href="javascript:;" class="text-muted">Edit</a>
								</div>
                <div class="row g-0 p-1">
                  <div class="col-3 text-center">
                    <a href="pages/apps/chat.html" class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70"><i data-feather="message-square" class="icon-lg mb-1"></i><p class="tx-12">Chat</p></a>
                  </div>
                  <div class="col-3 text-center">
                    <a href="pages/apps/calendar.html" class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70"><i data-feather="calendar" class="icon-lg mb-1"></i><p class="tx-12">Calendar</p></a>
                  </div>
                  <div class="col-3 text-center">
                    <a href="pages/email/inbox.html" class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70"><i data-feather="mail" class="icon-lg mb-1"></i><p class="tx-12">Email</p></a>
                  </div>
                  <div class="col-3 text-center">
                    <a href="pages/general/profile.html" class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70"><i data-feather="instagram" class="icon-lg mb-1"></i><p class="tx-12">Profile</p></a>
                  </div>
                </div>
								<div class="px-3 py-2 d-flex align-items-center justify-content-center border-top">
									<a href="javascript:;">View all</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown d-none">
							<a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i data-feather="mail"></i>
							</a>
							<div class="dropdown-menu p-0" aria-labelledby="messageDropdown">
								<div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">
									<p>9 New Messages</p>
									<a href="javascript:;" class="text-muted">Clear all</a>
								</div>
                <div class="p-1">
                  <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                    <div class="me-3">
                      <img class="wd-30 ht-30 rounded-circle" src="{{asset('assets/images/faces/face2.jpg')}}" alt="userr">
                    </div>
                    <div class="d-flex justify-content-between flex-grow-1">
                      <div class="me-4">
                        <p>Leonardo Payne</p>
                        <p class="tx-12 text-muted">Project status</p>
                      </div>
                      <p class="tx-12 text-muted">2 min ago</p>
                    </div>
                  </a>
                  <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                    <div class="me-3">
                      <img class="wd-30 ht-30 rounded-circle" src="{{asset('assets/images/faces/face3.jpg')}}" alt="userr">
                    </div>
                    <div class="d-flex justify-content-between flex-grow-1">
                      <div class="me-4">
                        <p>Carl Henson</p>
                        <p class="tx-12 text-muted">Client meeting</p>
                      </div>
                      <p class="tx-12 text-muted">30 min ago</p>
                    </div>
                  </a>
                  <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                    <div class="me-3">
                      <img class="wd-30 ht-30 rounded-circle" src="{{asset('assets/images/faces/face4.jpg')}}" alt="userr">
                    </div>
                    <div class="d-flex justify-content-between flex-grow-1">
                      <div class="me-4">
                        <p>Jensen Combs</p>
                        <p class="tx-12 text-muted">Project updates</p>
                      </div>
                      <p class="tx-12 text-muted">1 hrs ago</p>
                    </div>
                  </a>
                  <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                    <div class="me-3">
                      <img class="wd-30 ht-30 rounded-circle" src="{{asset('assets/images/faces/face5.jpg')}}" alt="userr">
                    </div>
                    <div class="d-flex justify-content-between flex-grow-1">
                      <div class="me-4">
                        <p>Amiah Burton</p>
                        <p class="tx-12 text-muted">Project deatline</p>
                      </div>
                      <p class="tx-12 text-muted">2 hrs ago</p>
                    </div>
                  </a>
                  <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                    <div class="me-3">
                      <img class="wd-30 ht-30 rounded-circle" src="{{asset('assets/images/faces/face6.jpg')}}" alt="userr">
                    </div>
                    <div class="d-flex justify-content-between flex-grow-1">
                      <div class="me-4">
                        <p>Yaretzi Mayo</p>
                        <p class="tx-12 text-muted">New record</p>
                      </div>
                      <p class="tx-12 text-muted">5 hrs ago</p>
                    </div>
                  </a>
                </div>
								<div class="px-3 py-2 d-flex align-items-center justify-content-center border-top">
									<a href="javascript:;">View all</a>
								</div>
							</div>
						</li>
            {{-- Notification --}}
						<li class="nav-item dropdown d-none">
							<a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i data-feather="bell"></i>
								<div class="indicator">
									<div class="circle"></div>
								</div>
							</a>
							<div class="dropdown-menu p-0" aria-labelledby="notificationDropdown">
								<div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">
									<p>6 New Notifications</p>
									<a href="javascript:;" class="text-muted">Clear all</a>
								</div>
                <div class="p-1">
                  <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                    <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
											<i class="icon-sm text-white" data-feather="gift"></i>
                    </div>
                    <div class="flex-grow-1 me-2">
											<p>New Order Recieved</p>
											<p class="tx-12 text-muted">30 min ago</p>
                    </div>
                  </a>
                  <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                    <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
											<i class="icon-sm text-white" data-feather="alert-circle"></i>
                    </div>
                    <div class="flex-grow-1 me-2">
											<p>Server Limit Reached!</p>
											<p class="tx-12 text-muted">1 hrs ago</p>
                    </div>
                  </a>
                  <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                    <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
                      <img class="wd-30 ht-30 rounded-circle" src="{{asset('assets/images/faces/face6.jpg')}}" alt="userr">
                    </div>
                    <div class="flex-grow-1 me-2">
											<p>New customer registered</p>
											<p class="tx-12 text-muted">2 sec ago</p>
                    </div>
                  </a>
                  <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                    <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
											<i class="icon-sm text-white" data-feather="layers"></i>
                    </div>
                    <div class="flex-grow-1 me-2">
											<p>Apps are ready for update</p>
											<p class="tx-12 text-muted">5 hrs ago</p>
                    </div>
                  </a>
                  <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                    <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
											<i class="icon-sm text-white" data-feather="download"></i>
                    </div>
                    <div class="flex-grow-1 me-2">
											<p>Download completed</p>
											<p class="tx-12 text-muted">6 hrs ago</p>
                    </div>
                  </a>
                </div>
								<div class="px-3 py-2 d-flex align-items-center justify-content-center border-top">
									<a href="javascript:;">View all</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<img class="wd-30 ht-30 rounded-circle" src="{{asset('assets/images/faces/face1.jpg')}}" alt="profile">
							</a>
							<div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
								<div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
									<div class="mb-3">
										<img class="wd-80 ht-80 rounded-circle" src="{{asset('assets/images/faces/face1.jpg')}}" alt="">
									</div>
									<div class="text-center">
										<p class="tx-16 fw-bolder">{{session()->get("user-data")->name}}</p>
										<p class="tx-12 text-muted">{{session()->get("user-data")->username}}</p>
										<p class="tx-12 text-muted">{{session()->get("user-data")->role}}</p>
									</div>
								</div>
                <ul class="list-unstyled p-1">
                  <li class="dropdown-item py-2  d-none">
                    <a href="pages/general/profile.html" class="text-body ms-0">
                      <i class="me-2 icon-md" data-feather="user"></i>
                      <span>Profile</span>
                    </a>
                  </li>
                  <li class="dropdown-item py-2">
                    <a href="/change-password" class="text-body ms-0">
                      <i class="me-2 icon-md" data-feather="edit"></i>
                      <span>تغيير كلمة السر</span>
                    </a>
                  </li>
                  <li class="dropdown-item py-2 d-none">
                    <a href="/change-password" class="text-body ms-0">
                      <i class="me-2 icon-md" data-feather="repeat"></i>
                      <span>Switch User</span>
                    </a>
                  </li>
                  <li class="dropdown-item py-2">
                    <a href="/logout" class="text-body ms-0">
                      <i class="me-2 icon-md" data-feather="log-out"></i>
                      <span>تسجيل الخروج</span>
                    </a>
                  </li>
                </ul>
							</div>
						</li>
					</ul>
				</div>
			</nav>
			<!-- partial -->

			<div class="page-content">

                    @yield('content')

			</div>

			<!-- partial:partials/_footer.html -->
			@extends('layout.footer')
			<!-- partial -->

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
