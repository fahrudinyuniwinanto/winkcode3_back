<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="{{parsys('META_DESC')}}" name="description" />
    <meta content="{{parsys('META_AUTHOR')}}" name="author" />
    <meta content="{{parsys('META_KEYWORDS')}}" name="keywords" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Title  -->
    <title>{{parsys('APP_NAME')}}</title>
    <link rel="icon" href="{{asset('/assets/vendor/sonar')}}/img/core-img/phoca.png">

    <!-- Style CSS -->
    {{-- <link rel="stylesheet" href="{{asset('/assets/vendor/sonar')}}/style.css"> --}}
    <link href="{{asset('assets/vendor/seantheme')}}/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{asset('assets/vendor/seantheme')}}/plugins/bootstrap-datepicker/css/datepicker.css"
        rel="stylesheet" />
    <link href="{{asset('assets/vendor/seantheme')}}/plugins/bootstrap-datepicker/css/datepicker3.css"
        rel="stylesheet" />
    <!-- Favicon  -->

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{asset('/assets/vendor/sonar')}}/style.css">
    {{-- <script src="{{asset('assets/vendor/seantheme')}}/plugins/jquery/jquery-1.9.1.min.js"></script> --}}
    <script src="{{asset('assets/vendor/sonar')}}/js/jquery/jquery-2.2.4.min.js"></script>
    <script src="{{asset('assets/vendor/seantheme')}}/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <!-- Popper js -->
    <script src="{{asset('/assets/vendor/sonar')}}/js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="{{asset('/assets/vendor/sonar')}}/js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="{{asset('/assets/vendor/sonar')}}/js/plugins.js"></script>
    <link href="{{asset('')}}assets/vendor/sweetalert/css/sweetalert.css" rel="stylesheet">

    <link href="{{asset('')}}assets/js/angular/ng-table/ng-table.min.css" rel="stylesheet" />
    <script src="{{asset('')}}assets/js/sf.js"></script>
    <script src="{{asset('')}}assets/js/angular/angular.min.js"></script>
    <script src="{{asset('')}}assets/js/angular/angular-cookies.min.js"></script>
    <script src="{{asset('')}}assets/js/angular/angular-route.js"></script>
    <script src="{{asset('')}}assets/js/angular/angular-sanitize.js"></script>
    <script src="{{asset('')}}assets/js/angular-file-upload/angular-file-upload.min.js"></script>
    <script src="{{asset('')}}assets/js/angular/ng-table/ng-table.min.js"></script>
    <script src="{{asset('')}}assets/js/angular/sf-angular.js"></script>
    <script src="{{asset('')}}assets/js/sfAngular.js"></script>
    <script src="{{asset('')}}assets/js/angular/sf3.js"></script>
    <script src="{{asset('')}}assets/js/angular-strap/angular-strap.min.js"></script>
    <script src="{{asset('')}}assets/js/angular-strap/angular-strap.tpl.min.js"></script>
    <script src="{{asset('')}}assets/js/angular/dynamic-number.min.js?ver=2019.06.12')}}"></script>

</head>

<body ng-app="sfApp" ng-controller="topCtrl" id="topCtrl">

    <!-- Preloader Start -->
    <div id="preloader">
        <div class="preload-content">
            <div id="sonar-load"></div>
        </div>
    </div>
    <!-- Preloader End -->

    <!-- Grids -->
    <div class="grids d-flex justify-content-between">
        {{-- <div class="grid1"></div>
        <div class="grid2"></div>
        <div class="grid3"></div>
        <div class="grid4"></div>
        <div class="grid5"></div>
        <div class="grid6"></div>
        <div class="grid7"></div>
        <div class="grid8"></div>
        <div class="grid9"></div> --}}
    </div>
    <!-- ***** Main Menu Area Start ***** -->
    <div class="mainMenu d-flex align-items-center justify-content-between">
        <!-- Close Icon -->
        <div class="closeIcon">
            <i class="ti-close" aria-hidden="true"></i>
        </div>
        <!-- Logo Area -->
        <div class="logo-area">
            <a href="{{url('')}}">{{parsys('APP_NAME')}}</a>
        </div>
        <!-- Nav -->
        <div class="sonarNav wow fadeInUp" data-wow-delay="1s">
            <nav>
                <ul>
                    {{-- @dd(getMenu('F')) --}}
                    @foreach (App\Helpers\MeHelper::getGuestMenu('F') as $menu)
                    {{-- {{print_r(getSubMenu1($menu->id,'F'))}} --}}
                    {{-- if punya child --}}
                    @if (count(App\Helpers\MeHelper::getSubMenu1($menu->id,'F'))>0)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{$menu->label}}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach (App\Helpers\MeHelper::getSubMenu1($menu->id,'F') as $sub1)
                            <a class="dropdown-item" href="{{url($sub1->url)}}">{{$sub1->label}}</a>
                            @endforeach
                        </div>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{url($menu->url)}}">{{$menu->label}}</a>
                    </li>
                    @endif
                    @endforeach

                </ul>
            </nav>
        </div>
        <!-- Copwrite Text -->
        <div class="copywrite-text">
            <p>{{parsys('LEFT_FOOTER')}}<a href="{{url('login')}}">&reg;</a></p>
        </div>
    </div>
    <!-- ***** Main Menu Area End ***** -->

    <!-- ***** Header Area Start ***** -->
    <header class="header-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="menu-area d-flex justify-content-between">
                        <!-- Logo Area  -->
                        <div class="logo-area">
                            <a href="{{url('')}}">{{parsys('APP_NAME')}}</a>
                        </div>

                        <div class="menu-content-area d-flex align-items-center">
                            <!-- Header Social Area -->
                            <div class="header-social-area d-flex align-items-center">
                                <a href="{{parsys('FB')}}" target="_blank" data-toggle="tooltip" data-placement="bottom"
                                    title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="{{parsys('IG')}}" target="_blank" data-toggle="tooltip" data-placement="bottom"
                                    title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                <a href="{{parsys('YOUTUBE')}}" target="_blank" data-toggle="tooltip"
                                    data-placement="bottom" title="Youtube"><i class="fa fa-youtube"
                                        aria-hidden="true"></i></a>
                                <a href="{{parsys('TWITTER')}}" target="_blank" data-toggle="tooltip"
                                    data-placement="bottom" title="Twitter"><i class="fa fa-twitter"
                                        aria-hidden="true"></i></a>

                            </div>
                            <!-- Menu Icon -->
                            <span class="navbar-toggler-icon" id="menuIcon"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->
    <div class="col-md-12" ng-app="sfApp" ng-controller="mainCtrl" id="mainCtrl">

        @yield('content')
    </div>
    <!-- ***** Call to Action Area End ***** -->

    <!-- ***** Footer Area Start ***** -->
    {{-- <footer class="footer-area"> --}}
    {{-- <div class="container"> --}}
    <div class="row">
        <div class="col-md-12">
            <!-- Copywrite Text -->
            <div class="copywrite-text text-center">
                <p>{{parsys('LEFT_FOOTER')}} | <strong>{{visitCounter()}}</strong> kali dikunjungi</p>
            </div>
        </div>
    </div>
    {{-- </div> --}}
    {{-- </footer> --}}
    <!-- ***** Footer Area End ***** -->

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    {{-- <script src="{{asset('/assets/vendor/sonar')}}/js/jquery/jquery-2.2.4.min.js"></script> --}}

    {{-- <script src="{{asset('/assets/vendor/seantheme')}}/plugins/fullcalendar/lib/moment.min.js"></script>
    <script src="{{asset('/assets/vendor/seantheme')}}/plugins/fullcalendar/fullcalendar.min.js"></script> --}}
    {{-- <script src="{{asset('/assets/vendor/seantheme')}}/js/calendar.demo.min.js"></script> --}}
    <!-- Active js -->
    <script src="{{asset('/assets/vendor/sonar')}}/js/active.js"></script>
    <script src="{{asset('')}}assets/vendor/sweetalert/js/sweetalert.min.js"></script>
    <script>
        $(document).ready(function() {
			// Calendar.init();
		});
    </script>

</body>

</html>