<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
	<meta charset="utf-8" />
	<title>{{Me::parsys('APP_NAME')}}</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="{{parsys('META_DESC')}}" name="description" />
	<meta content="{{parsys('META_AUTHOR')}}" name="author" />
	<meta content="{{parsys('META_KEYWORDS')}}" name="keywords" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="{{asset('/assets/vendor/seantheme')}}/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css"
		rel="stylesheet" />
	<link href="{{asset('assets/vendor/seantheme')}}/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="{{asset('assets/vendor/seantheme')}}/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
	<link href="{{asset('assets')}}/select2/select2.min.css" rel="stylesheet" />
	<link href="{{asset('assets/vendor/seantheme')}}/css/animate.min.css" rel="stylesheet" />
	<link href="{{asset('assets/vendor/seantheme')}}/css/style.min.css" rel="stylesheet" />
	<link href="{{asset('assets/vendor/seantheme')}}/css/style-responsive.min.css" rel="stylesheet" />
	<link href="{{asset('assets/vendor/seantheme')}}/css/theme/default.css" rel="stylesheet" id="theme" />
	<link href="{{asset('/assets/vendor/seantheme')}}/plugins/fullcalendar/fullcalendar.print.css" rel="stylesheet"
		media='print' />
	<link href="{{asset('/assets/vendor/seantheme')}}/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" />

	<!-- ================== END BASE CSS STYLE ================== -->

	<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
	<link href="{{asset('assets/vendor/seantheme')}}/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.css"
		rel="stylesheet" />
	<link href="{{asset('assets/vendor/seantheme')}}/plugins/bootstrap-datepicker/css/datepicker.css"
		rel="stylesheet" />
	<link href="{{asset('assets/vendor/seantheme')}}/plugins/bootstrap-datepicker/css/datepicker3.css"
		rel="stylesheet" />
	<link href="{{asset('assets/vendor/seantheme')}}/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
	<link href="{{asset('assets/vendor/seantheme')}}/plugins/bootstrap-wizard/css/bwizard.min.css" rel="stylesheet" />
	<!-- ================== END PAGE LEVEL STYLE ================== -->

	<!-- ================== BEGIN BASE JS ================== -->
	<script src="{{asset('assets/vendor/seantheme')}}/plugins/jquery/jquery-1.9.1.min.js"></script>
	<script src="{{asset('assets')}}/select2/select2.min.js"></script>
	<script src="{{asset('assets/vendor/seantheme')}}/plugins/pace/pace.min.js"></script>
	<!-- ================== END BASE JS ================== -->
	{{-- VENDOR LAIN --}}
	<link href="{{asset('')}}assets/vendor/sweetalert/css/sweetalert.css" rel="stylesheet">
	<style>
		tr.terhapus td {
			text-decoration: line-through !important;
			color: #ed5565 !important;
		}

		.no-border-text {
			border: 0px;
		}
	</style>
	<script src="{{asset('assets')}}/js/sf.js"></script>

	{{-- ANGULAR --}}
	<script src="{{asset('')}}assets/js/angular/angular.min.js"></script>
	<script src="{{asset('')}}assets/js/angular/angular-cookies.min.js"></script>
	<script src="{{asset('')}}assets/js/angular/angular-route.js"></script>
	<script src="{{asset('')}}assets/js/angular/angular-sanitize.js"></script>
	<script src="{{asset('')}}assets/js/angular-file-upload/angular-file-upload.min.js"></script>
	<link href="{{asset('')}}assets/js/angular/ng-table/ng-table.min.css" rel="stylesheet" />
	<script src="{{asset('')}}assets/js/angular/ng-table/ng-table.min.js"></script>
	<script src="{{asset('')}}assets/js/angular/sf-angular.js"></script>
	<script src="{{asset('')}}assets/js/sfAngular.js"></script>
	<script src="{{asset('')}}assets/js/angular/sf3.js"></script>
	<script src="{{asset('')}}assets/js/angular-strap/angular-strap.min.js"></script>
	<script src="{{asset('')}}assets/js/angular-strap/angular-strap.tpl.min.js"></script>
	<script src="{{asset('')}}assets/js/angular/dynamic-number.min.js?ver=2019.06.12')}}"></script>
	<style>
		.pointer {
			cursor: pointer;
		}
	</style>
</head>

<body>

	<!-- begin #page-loader -->
	<div id="page-loader" class="fade in"><span class="spinner"></span></div>
	<!-- end #page-loader -->

	<!-- begin #page-container -->
	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
		<!-- begin #header -->
		<div id="header" class="header navbar navbar-default navbar-fixed-top">
			<!-- begin container-fluid -->
			<div class="container-fluid">
				<!-- begin mobile sidebar expand / collapse button -->
				<div class="navbar-header">
					<a href="index.html" class="navbar-brand"><span class="navbar-logo"></span>
						<?=Me::parsys('APP_NAME')?></a>
					<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<!-- end mobile sidebar expand / collapse button -->

				<!-- begin header navigation right -->
				<ul class="nav navbar-nav navbar-right">
					<li>
						<form class="navbar-form full-width">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Enter keyword" />
								<button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
							</div>
						</form>
					</li>
					<li class="dropdown">
						<a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle f-s-14">
							<i class="fa fa-bell-o"></i>
							<span class="label">5</span>
						</a>
						<ul class="dropdown-menu media-list pull-right animated fadeInDown">
							<li class="dropdown-header">Notifications (5)</li>
							<li class="media">
								<a href="javascript:;">
									<div class="media-left"><i class="fa fa-bug media-object bg-red"></i></div>
									<div class="media-body">
										<h6 class="media-heading">Server Error Reports</h6>
										<div class="text-muted f-s-11">3 minutes ago</div>
									</div>
								</a>
							</li>
							<li class="media">
								<a href="javascript:;">
									<div class="media-left"><img
											src="{{asset('/assets/vendor/seantheme')}}/img/user-1.jpg"
											class="media-object" alt="" /></div>
									<div class="media-body">
										<h6 class="media-heading">John Smith</h6>
										<p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
										<div class="text-muted f-s-11">25 minutes ago</div>
									</div>
								</a>
							</li>
							<li class="media">
								<a href="javascript:;">
									<div class="media-left"><img
											src="{{asset('/assets/vendor/seantheme')}}/img/user-2.jpg"
											class="media-object" alt="" /></div>
									<div class="media-body">
										<h6 class="media-heading">Olivia</h6>
										<p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
										<div class="text-muted f-s-11">35 minutes ago</div>
									</div>
								</a>
							</li>
							<li class="media">
								<a href="javascript:;">
									<div class="media-left"><i class="fa fa-plus media-object bg-green"></i></div>
									<div class="media-body">
										<h6 class="media-heading"> New User Registered</h6>
										<div class="text-muted f-s-11">1 hour ago</div>
									</div>
								</a>
							</li>
							<li class="media">
								<a href="javascript:;">
									<div class="media-left"><i class="fa fa-envelope media-object bg-blue"></i></div>
									<div class="media-body">
										<h6 class="media-heading"> New Email From John</h6>
										<div class="text-muted f-s-11">2 hour ago</div>
									</div>
								</a>
							</li>
							<li class="dropdown-footer text-center">
								<a href="javascript:;">View more</a>
							</li>
						</ul>
					</li>
					<li class="dropdown navbar-user">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
							<img src="{{asset('/assets/vendor/seantheme')}}/img/user-13.jpg" alt="" />
							<span class="hidden-xs">{{@Auth::user()->nama_lengkap}}</span> <b class="caret"></b>
						</a>
						<ul class="dropdown-menu animated fadeInLeft">
							<li class="arrow"></li>
							<li><a href="{{url('users/profil')}}">Edit Profile</a></li>
							<li><a href="javascript:;"><span class="badge badge-danger pull-right">2</span> Inbox</a>
							</li>
							<li><a href="javascript:;">Calendar</a></li>
							<li><a href="javascript:;">Setting</a></li>
							<li class="divider"></li>
							<li><a href="{{url('logout')}}">Log Out</a></li>
						</ul>
					</li>
				</ul>
				<!-- end header navigation right -->
			</div>
			<!-- end container-fluid -->
		</div>
		<!-- end #header -->

		<!-- begin #sidebar -->
		<div id="sidebar" class="sidebar">
			<!-- begin sidebar scrollbar -->
			<div data-scrollbar="true" data-height="100%">
				<!-- begin sidebar user -->
				<ul class="nav">
					<li class="nav-profile">
						<div class="image">
							<a href="javascript:;"><img src="{{asset('/assets/vendor/seantheme')}}/img/user-13.jpg"
									alt="" /></a>
						</div>
						<div class="info">
							{{ @Auth::user()->username }}
							{{-- @dd(Auth::user()->group()) --}}
							<small>Group {{ @Auth::user()->group->name }}</small>
						</div>
					</li>
				</ul>
				<!-- end sidebar user -->
				<!-- begin sidebar nav -->
				<ul class="nav">
					@include('layout.left_menu')
				</ul>
				<!-- end sidebar nav -->
			</div>
			<!-- end sidebar scrollbar -->
		</div>
		<div class="sidebar-bg"></div>
		<!-- end #sidebar -->

		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<!--	<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li class="active">Dashboard</li>
			</ol>
		-->
			<div class="pull-right"> @yield('toolbar')</div>
			@yield('pagetitle')
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			{{-- <h1 class="page-header">Dashboard <small>header small text goes here...</small></h1> --}}
			<!-- end page-header -->

			<!-- begin row -->
			<!-- end row -->
			<!-- begin row -->
			<div class="row">

				<div class="col-md-12" ng-app="sfApp" ng-controller="mainCtrl" id="mainCtrl">

					@yield('content')
				</div>
			</div>
			<!-- end #content -->

			<!-- begin theme-panel -->
			<div class="theme-panel">
				<a href="javascript:;" data-click="theme-panel-expand" class="theme-collapse-btn"><i
						class="fa fa-cog"></i></a>
				<div class="theme-panel-content">
					<h5 class="m-t-0">Color Theme</h5>
					<ul class="theme-list clearfix">
						<li class="active"><a href="javascript:;" class="bg-green" data-theme="default"
								data-click="theme-selector" data-toggle="tooltip" data-trigger="hover"
								data-container="body" data-title="Default">&nbsp;</a></li>
						<li><a href="javascript:;" class="bg-red" data-theme="red" data-click="theme-selector"
								data-toggle="tooltip" data-trigger="hover" data-container="body"
								data-title="Red">&nbsp;</a></li>
						<li><a href="javascript:;" class="bg-blue" data-theme="blue" data-click="theme-selector"
								data-toggle="tooltip" data-trigger="hover" data-container="body"
								data-title="Blue">&nbsp;</a></li>
						<li><a href="javascript:;" class="bg-purple" data-theme="purple" data-click="theme-selector"
								data-toggle="tooltip" data-trigger="hover" data-container="body"
								data-title="Purple">&nbsp;</a></li>
						<li><a href="javascript:;" class="bg-orange" data-theme="orange" data-click="theme-selector"
								data-toggle="tooltip" data-trigger="hover" data-container="body"
								data-title="Orange">&nbsp;</a></li>
						<li><a href="javascript:;" class="bg-black" data-theme="black" data-click="theme-selector"
								data-toggle="tooltip" data-trigger="hover" data-container="body"
								data-title="Black">&nbsp;</a></li>
					</ul>
					<div class="divider"></div>
					<div class="row m-t-10">
						<div class="col-md-5 control-label double-line">Header Styling</div>
						<div class="col-md-7">
							<select name="header-styling" class="form-control input-sm">
								<option value="1">default</option>
								<option value="2">inverse</option>
							</select>
						</div>
					</div>
					<div class="row m-t-10">
						<div class="col-md-5 control-label">Header</div>
						<div class="col-md-7">
							<select name="header-fixed" class="form-control input-sm">
								<option value="1">fixed</option>
								<option value="2">default</option>
							</select>
						</div>
					</div>
					<div class="row m-t-10">
						<div class="col-md-5 control-label double-line">Sidebar Styling</div>
						<div class="col-md-7">
							<select name="sidebar-styling" class="form-control input-sm">
								<option value="1">default</option>
								<option value="2">grid</option>
							</select>
						</div>
					</div>
					<div class="row m-t-10">
						<div class="col-md-5 control-label">Sidebar</div>
						<div class="col-md-7">
							<select name="sidebar-fixed" class="form-control input-sm">
								<option value="1">fixed</option>
								<option value="2">default</option>
							</select>
						</div>
					</div>
					<div class="row m-t-10">
						<div class="col-md-5 control-label double-line">Sidebar Gradient</div>
						<div class="col-md-7">
							<select name="content-gradient" class="form-control input-sm">
								<option value="1">disabled</option>
								<option value="2">enabled</option>
							</select>
						</div>
					</div>
					<div class="row m-t-10">
						<div class="col-md-5 control-label double-line">Content Styling</div>
						<div class="col-md-7">
							<select name="content-styling" class="form-control input-sm">
								<option value="1">default</option>
								<option value="2">black</option>
							</select>
						</div>
					</div>
					<div class="row m-t-10">
						<div class="col-md-12">
							<a href="#" class="btn btn-inverse btn-block btn-sm" data-click="reset-local-storage"><i
									class="fa fa-refresh m-r-3"></i> Reset Local Storage</a>
						</div>
					</div>
				</div>
			</div>
			<!-- end theme-panel -->

			<!-- begin scroll to top btn -->
			<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade"
				data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
			<!-- end scroll to top btn -->
		</div>
		<!-- end page container -->

		<!-- ================== BEGIN BASE JS ================== -->

		<script src="{{asset('assets/vendor/seantheme')}}/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
		<script src="{{asset('assets/vendor/seantheme')}}/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
		<script src="{{asset('assets/vendor/seantheme')}}/plugins/bootstrap/js/bootstrap.min.js"></script>
		<script src="{{asset('assets')}}/js/sf.js"></script>
		<script src="{{asset('/assets/vendor/seantheme')}}/plugins/fullcalendar/lib/moment.min.js"></script>
		<script src="{{asset('/assets/vendor/seantheme')}}/plugins/fullcalendar/fullcalendar.min.js"></script>
		<script src="{{asset('/assets/vendor/seantheme')}}/js/calendar.demo.min.js"></script>
		{{-- <script src="{{asset('/assets/vendor/seantheme')}}/js/calendar.demo.min.js"></script> --}}
		<!--[if lt IE 9]>
		<script src="assets/crossbrowserjs/html5shiv.js"></script>
		<script src="assets/crossbrowserjs/respond.min.js"></script>
		<script src="assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
		<script src="{{asset('assets/vendor/seantheme')}}/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		<script src="{{asset('assets/vendor/seantheme')}}/plugins/jquery-cookie/jquery.cookie.js"></script>
		<!-- ================== END BASE JS ================== -->
		{{-- DATATABLE --}}
		<script src="{{asset('assets/vendor/seantheme')}}/plugins/DataTables/media/js/jquery.dataTables.js"></script>

		<!-- ================== BEGIN PAGE LEVEL JS ================== -->
		<script src="{{asset('assets/vendor/seantheme')}}/plugins/gritter/js/jquery.gritter.js"></script>
		<script src="{{asset('assets/vendor/seantheme')}}/plugins/flot/jquery.flot.min.js"></script>
		<script src="{{asset('assets/vendor/seantheme')}}/plugins/flot/jquery.flot.time.min.js"></script>
		<script src="{{asset('assets/vendor/seantheme')}}/plugins/flot/jquery.flot.resize.min.js"></script>
		<script src="{{asset('assets/vendor/seantheme')}}/plugins/flot/jquery.flot.pie.min.js"></script>
		<script src="{{asset('assets/vendor/seantheme')}}/plugins/sparkline/jquery.sparkline.js"></script>
		<script src="{{asset('assets/vendor/seantheme')}}/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.min.js">
		</script>
		<script src="{{asset('assets/vendor/seantheme')}}/plugins/jquery-jvectormap/jquery-jvectormap-world-mill-en.js">
		</script>
		<script src="{{asset('assets/vendor/seantheme')}}/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js">
		</script>
		<script src="{{asset('assets/vendor/seantheme')}}/plugins/moment/moment.min.js">
		</script>
		<script src="{{asset('assets/vendor/seantheme')}}/js/dashboard.min.js"></script>
		<script src="{{asset('assets/vendor/seantheme')}}/js/apps.min.js"></script>
		<script src="{{asset('')}}assets/vendor/sweetalert/js/sweetalert.min.js"></script>
		<script src="{{asset('assets/vendor/seantheme')}}/plugins/bootstrap-wizard/js/bwizard.js"></script>
		<script src="{{asset('assets/vendor/seantheme')}}/js/form-wizards.demo.min.js"></script>
		<!-- ================== END PAGE LEVEL JS ================== -->

		<script>
			$(document).ready(function() {
			App.init();
			// Dashboard.init();
			// FormWizard.init();
			// $.gritter.add({
			// // (string | mandatory) the heading of the notification
			// title: 'Berhasil!',
			// // (string | mandatory) the text inside the notification
			// text: 'Data berhasil dihapus',
			// class_name: 'gritter-light'
			// });
			
		});
		</script>
</body>

</html>