@extends('layout.frontend')
@section('content')
<div class="main-wrapper">
    <div class="active-banner-slider">
        <div class="item d-flex align-items-center">
            <div class="container">
                <div class="content">
                    <h1 class="text-white text-uppercase">{{Me::parsys('APP_NAME')}}
                    </h1>
                    <p class="text-white">{{Me::parsys('APP_DESC')}}</p>
                    <a href="#" class="primary-btn d-inline-flex align-items-center"><span class="mr-10">Get
                            Started</span><span class="lnr lnr-arrow-right"></span></a>
                </div>
            </div>
        </div>
        <div class="item d-flex align-items-center">
            <div class="container">
                <div class="content">
                    <h1 class="text-white text-uppercase">Instead of eating, <br> you should feel the garnishing
                    </h1>
                    <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor <br>incididunt ut labore et dolore magna aliqua.</p>
                    <a href="#" class="primary-btn d-inline-flex align-items-center"><span class="mr-10">Get
                            Started</span><span class="lnr lnr-arrow-right"></span></a>
                </div>
            </div>
        </div>
        <div class="item d-flex align-items-center">
            <div class="container">
                <div class="content">
                    <h1 class="text-white text-uppercase">Instead of eating, <br> you should feel the garnishing
                    </h1>
                    <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor <br>incididunt ut labore et dolore magna aliqua.</p>
                    <a href="#" class="primary-btn d-inline-flex align-items-center"><span class="mr-10">Get
                            Started</span><span class="lnr lnr-arrow-right"></span></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="main-wrapper">
    <!-- Start Feature Area -->
    <section class="featured-area">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-feature">
                        <div class="icon">
                            <span class="lnr lnr-sun"></span>
                        </div>
                        <div class="desc text-center">
                            <h6 class="title text-uppercase">Stunning Visuals</h6>
                            <p>Here, I focus on a range of items and features that we use in life without giving
                                them a second thought such as Coca Cola, body</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-feature">
                        <div class="icon">
                            <span class="lnr lnr-code"></span>
                        </div>
                        <div class="desc text-center">
                            <h6 class="title text-uppercase">Clean Code</h6>
                            <p>Over 92% of computers are infected with Adware and spyware. Such software is rarely
                                accompanied by uninstall utility </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-feature">
                        <div class="icon">
                            <span class="lnr lnr-clock"></span>
                        </div>
                        <div class="desc text-center">
                            <h6 class="title text-uppercase">Punctuality</h6>
                            <p>If you own an Iphone, you’ve probably already worked out how much fun it is to use it
                                to watch movies-it has that nice big screen</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-feature">
                        <div class="icon">
                            <span class="lnr lnr-sun"></span>
                        </div>
                        <div class="desc text-center">
                            <h6 class="title text-uppercase">Stunning Visuals</h6>
                            <p>Here, I focus on a range of items and features that we use in life without giving
                                them a second thought such as Coca Cola, body</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-feature">
                        <div class="icon">
                            <span class="lnr lnr-code"></span>
                        </div>
                        <div class="desc text-center">
                            <h6 class="title text-uppercase">Clean Code</h6>
                            <p>Over 92% of computers are infected with Adware and spyware. Such software is rarely
                                accompanied by uninstall utility </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-feature">
                        <div class="icon">
                            <span class="lnr lnr-clock"></span>
                        </div>
                        <div class="desc text-center">
                            <h6 class="title text-uppercase">Punctuality</h6>
                            <p>If you own an Iphone, you’ve probably already worked out how much fun it is to use it
                                to watch movies-it has that nice big screen</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Feature Area -->
    <!-- Start Story Area -->
    <section class="story-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <div class="story-title">
                        <h3 class="text-white">Our Untold Story</h3>
                        <span class="text-uppercase text-white">Re-imagining the way</span>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="story-box">
                        <h6 class="text-uppercase">From the part of beginning</h6>
                        <p>Usage of the Internet is becoming more common due to rapid advancement of technology and
                            the power of globalization. Societies are becoming more inter-connected. Thoughts from
                            different</p>
                        <a href="#" class="primary-btn d-inline-flex align-items-center"><span class="mr-10">Get
                                Started</span><span class="lnr lnr-arrow-right"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Story Area -->

    <!-- Start Amazing Works Area -->

    <section class="amazing-works-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center">
                        <h3>Our Amazing Works</h3>
                        <span class="text-uppercase">Re-imagining the way</span>
                    </div>
                </div>
            </div>
            <div class="active-works-carousel mt-40">
                <div class="item">
                    <div class="thumb" style="background: url({{asset('/assets/vendor/gocrepe')}}/img/sd1.jpg);">
                    </div>
                    <div class="caption text-center">
                        <h6 class="text-uppercase">Vector Illustration</h6>
                        <p>LCD screens are uniquely modern in style, and the liquid crystals <br> that make them
                            work have allowed humanity to</p>
                    </div>
                </div>
                <div class="item">
                    <div class="thumb" style="background: url({{asset('/assets/vendor/gocrepe')}}/img/sd1.jpg);">
                    </div>
                    <div class="caption text-center">
                        <h6 class="text-uppercase">Vector Illustration</h6>
                        <p>LCD screens are uniquely modern in style, and the liquid crystals <br> that make them
                            work have allowed humanity to</p>
                    </div>
                </div>
                <div class="item">
                    <div class="thumb" style="background: url({{asset('/assets/vendor/gocrepe')}}/img/sd1.jpg);">
                    </div>
                    <div class="caption text-center">
                        <h6 class="text-uppercase">Vector Illustration</h6>
                        <p>LCD screens are uniquely modern in style, and the liquid crystals <br> that make them
                            work have allowed humanity to</p>
                    </div>
                </div>
                <div class="item">
                    <div class="thumb" style="background:url({{asset('/assets/vendor/gocrepe')}}/img/sd1.jpg);">
                    </div>
                    <div class="caption text-center">
                        <h6 class="text-uppercase">Vector Illustration</h6>
                        <p>LCD screens are uniquely modern in style, and the liquid crystals <br> that make them
                            work have allowed humanity to</p>
                    </div>
                </div>
                <div class="item">
                    <div class="thumb" style="background:url({{asset('/assets/vendor/gocrepe')}}/img/sd1.jpg);">
                    </div>
                    <div class="caption text-center">
                        <h6 class="text-uppercase">Vector Illustration</h6>
                        <p>LCD screens are uniquely modern in style, and the liquid crystals <br> that make them
                            work have allowed humanity to</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Amazing Works Area -->
    <!-- Start Story Area -->
    <section class="story-area-2">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <div class="story-title sm-show text-center">
                        <h3 class="text-white">Our Untold Story</h3>
                        <span class="text-uppercase text-white">Re-imagining the way</span>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="story-box">
                        <h6 class="text-uppercase">From the part of beginning</h6>
                        <p>Usage of the Internet is becoming more common due to rapid advancement of technology and
                            the power of globalization. Societies are becoming more inter-connected. Thoughts from
                            different</p>
                        <a href="#" class="primary-btn d-inline-flex align-items-center"><span class="mr-10">Get
                                Started</span><span class="lnr lnr-arrow-right"></span></a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="story-title sm-hide text-right">
                        <h3 class="text-white">Our Untold Story</h3>
                        <span class="text-uppercase text-white">Re-imagining the way</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Story Area -->
    <div class="brand-area">
        <div class="container">
            <div class="total-brand d-flex justify-content-around">
                <img src="{{asset('/assets/vendor/gocrepe')}}/img/b1.png" alt="">
                <img src="{{asset('/assets/vendor/gocrepe')}}/img/b2.png" alt="">
                <img src="{{asset('/assets/vendor/gocrepe')}}/img/b3.png" alt="">
                <img src="{{asset('/assets/vendor/gocrepe')}}/img/b4.png" alt="">
                <img src="{{asset('/assets/vendor/gocrepe')}}/img/b5.png" alt="">
            </div>
        </div>
    </div>
    <!-- Start Subscription Area -->
    <section class="subscription-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center">
                        <h3>Subscribe for our Newsletter</h3>
                        <span class="text-uppercase">Re-imagining the way</span>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div id="mc_embed_signup">
                        <form target="_blank" novalidate
                            action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&id=92a4423d01"
                            method="get" class="subscription relative">
                            <input type="email" name="EMAIL" placeholder="Email address" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'Email address'" required>
                            <div style="position: absolute; left: -5000px;">
                                <input type="text" name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="">
                            </div>
                            <button class="primary-btn hover d-inline-flex align-items-center"><span class="mr-10">Get
                                    Started</span><span class="lnr lnr-arrow-right"></span></button>
                            <div class="info"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Subscription Area -->
    <!-- Start Footer Widget Area -->
    @endsection