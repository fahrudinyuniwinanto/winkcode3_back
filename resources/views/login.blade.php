<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8" />
    <title>{{Me::parsys('APP_NAME')}} | Login Page</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="{{asset('/assets/vendor/seantheme')}}/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css"
        rel="stylesheet" />
    <link href="{{asset('/assets/vendor/seantheme')}}/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{asset('/assets/vendor/seantheme')}}/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="{{asset('/assets/vendor/seantheme')}}/css/animate.min.css" rel="stylesheet" />
    <link href="{{asset('/assets/vendor/seantheme')}}/css/style.min.css" rel="stylesheet" />
    <link href="{{asset('/assets/vendor/seantheme')}}/css/style-responsive.min.css" rel="stylesheet" />
    <link href="{{asset('/assets/vendor/seantheme')}}/css/theme/default.css" rel="stylesheet" id="theme" />
    <link href="{{asset('')}}assets/vendor/sweetalert/css/sweetalert.css" rel="stylesheet">
    <!-- ================== END BASE CSS STYLE ================== -->

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="{{asset('/assets/vendor/seantheme')}}/plugins/pace/pace.min.js"></script>
    <!-- ================== END BASE JS ================== -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body class="pace-top bg-white">
    <!-- begin #page-loader -->
    <div id="page-loader" class="fade in"><span class="spinner"></span></div>
    <!-- end #page-loader -->

    <!-- begin #page-container -->
    <div id="page-container" class="fade">
        <!-- begin login -->
        <div class="login login-with-news-feed">
            <!-- begin news-feed -->
            <div class="news-feed">
                <div class="news-image">
                    <img src="{{asset('/assets/vendor/seantheme')}}/img/login-bg/bg-7.jpg" data-id="login-cover-image"
                        alt="" />
                </div>
                <div class="news-caption">
                    <h4 class="caption-title"><i class="fa fa-diamond text-success"></i> {{Me::parsys('APP_NAME')}}
                    </h4>
                    <p>
                        {{Me::parsys('APP_DESC')}}
                    </p>
                </div>
            </div>
            <!-- end news-feed -->
            <!-- begin right-content -->
            <div class="right-content">
                <!-- begin login-header -->
                <div class="login-header">
                    <div class="brand">
                        <span class="logo"></span> {{Me::parsys('APP_NAME')}}
                        <small><?=Me::parsys("APP_DESC")?></small>
                    </div>
                    <div class="icon">
                        <i class="fa fa-sign-in"></i>
                    </div>
                </div>
                <!-- end login-header -->
                <!-- begin login-content -->
                <div class="login-content">
                    <form action="backend/cek" method="POST" class="margin-bottom-0">
                        @csrf
                        <div class="form-group m-b-15">
                            <input type="text" class="form-control input-lg" name="email" placeholder="Email Address" />
                        </div>
                        <div class="form-group m-b-15">
                            <input type="text" class="form-control input-lg" name="password" placeholder="Password" />
                        </div>


                        {{-- <div class="g-recaptcha" data-sitekey="6LeTdVAaAAAAAHDrJhxeStGglM7Cfe4S0bH17oR4"></div>localhost --}}
                        <div class="g-recaptcha" data-sitekey="6LdDMY8aAAAAAK6QxDv6ScZ8XRuB5_kumeXJCgWI"></div>
                        {{-- //wisata.test --}}
                        <br />
                        <div class="checkbox m-b-30">
                            <label>
                                <input type="checkbox" /> Remember Me
                            </label>
                        </div>
                        <div class="login-buttons">
                            <button type="submit" class="btn btn-success btn-block btn-lg">Sign me in</button>
                        </div>
                        <div class="m-t-20 m-b-40 p-b-40">
                            Belum terdaftar? Klik <a href="#" class="text-success"
                                onclick="swal('','Hubungi Administrator','warning')">di sini</a> untuk registrasi.
                        </div>
                        <hr />
                        <p class="text-center text-inverse">
                            &copy; {{Me::parsys('APP_NAME')}}
                        </p>
                    </form>
                </div>
                <!-- end login-content -->
            </div>
            <!-- end right-container -->
        </div>
        <!-- end login -->


    </div>
    <!-- end page container -->

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="{{asset('/assets/vendor/seantheme')}}/plugins/jquery/jquery-1.9.1.min.js"></script>
    <script src="{{asset('/assets/vendor/seantheme')}}/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
    <script src="{{asset('/assets/vendor/seantheme')}}/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
    <script src="{{asset('/assets/vendor/seantheme')}}/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!--[if lt IE 9]>
		<script src="assets/crossbrowserjs/html5shiv.js"></script>
		<script src="assets/crossbrowserjs/respond.min.js"></script>
		<script src="assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
    <script src="{{asset('/assets/vendor/seantheme')}}/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="{{asset('/assets/vendor/seantheme')}}/plugins/jquery-cookie/jquery.cookie.js"></script>
    <!-- ================== END BASE JS ================== -->

    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="{{asset('/assets/vendor/seantheme')}}/js/apps.min.js"></script>
    <script src="{{asset('')}}assets/vendor/sweetalert/js/sweetalert.min.js"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->

    <script>
        $(document).ready(function() {
			App.init();
		});
        
    </script>
    <script type="text/javascript">
        var onloadCallback = function() {
        alert("grecaptcha is ready!");
    };
    </script>
</body>

</html>