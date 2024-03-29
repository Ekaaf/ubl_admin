<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>
			Unilever
		</title>
		<meta name="description" content="Latest updates and statistic charts">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!--begin::Web font -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
          WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
		</script>

		<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>

  
		<!--end::Web font -->
        <!--begin::Base Styles -->  
        <!--begin::Page Vendors -->
		<link href="{{URL::to('public/metronic/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Page Vendors -->
		<link href="{{URL::to('public/metronic/assets/vendors/base/vendors.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{URL::to('public/metronic/assets/demo/default/base/style.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{URL::to('public/css/custom.css')}}" rel="stylesheet" type="text/css" />
		<link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css"/>
		<link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
		<link href="https://cdn.datatables.net/buttons/1.6.0/css/buttons.dataTables.min.css">
		<!--end::Base Styles -->
		<!-- <link rel="shortcut icon" href="{{URL::to('public/logo_1.jpg')}}" /> -->
	</head>
	<!-- end::Head -->
    <!-- end::Body -->
	<body  class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
		<!-- begin:: Page -->
		<div class="m-grid m-grid--hor m-grid--root m-page">
			<!-- BEGIN: Header -->
			@include('layout.header')
			<!-- END: Header -->		
		<!-- begin::Body -->
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
				<!-- BEGIN: Left Aside -->
				@include('layout.sidebar')
				<!-- END: Left Aside -->
				@yield('content')
			</div>
			<!-- end:: Body -->
			<!-- begin::Footer -->
			@include('layout.footer')
			<!-- end::Footer -->
		</div>
		<!-- end:: Page -->
        <!-- begin::Quick Sidebar -->
		<!-- end::Quick Sidebar -->		    
	    <!-- begin::Scroll Top -->
		<div id="m_scroll_top" class="m-scroll-top">
			<i class="la la-arrow-up"></i>
		</div>
		<!-- end::Scroll Top -->		    <!-- begin::Quick Nav -->
		<!-- begin::Quick Nav -->	
    	<!--begin::Base Scripts -->
		<script src="{{URL::to('public/metronic/assets/vendors/base/vendors.bundle.js')}}" type="text/javascript"></script>
		<script src="{{URL::to('public/metronic/assets/demo/default/base/scripts.bundle.js')}}" type="text/javascript"></script>
		<!--end::Base Scripts -->   
        <!--begin::Page Vendors -->
		<!-- <script src="{{URL::to('public/metronic/assets/vendors/custom/fullcalendar/fullcalendar.bundle.js')}}" type="text/javascript"></script> -->
		<!--end::Page Vendors -->  
        <!--begin::Page Snippets -->
		<script src="{{URL::to('public/metronic/assets/app/js/dashboard.js')}}" type="text/javascript"></script>
		<!--end::Page Snippets -->
		<script type="text/javascript">
			// $(document).ready(function(){
			//   	$(".m-menu__item--submenu").hover(function(){
			// 		$(this).css("background-color", "#2B2A97");
			// 		}, function(){
			// 		$(this).css("background-color", "");
			// 	});
			// });
		</script>
		<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
		@include('layout.js')
	</body>
	<!-- end::Body -->
</html>
