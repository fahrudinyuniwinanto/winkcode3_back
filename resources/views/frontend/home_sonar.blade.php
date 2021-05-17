@extends('layout.frontend')
@section('content')



<!-- ***** Hero Area Start ***** -->
<section class="hero-area">
    <div class="hero-slides owl-carousel">
        {{-- @dd($slides->gambar[0]['files'][0]['name']);die(); --}}
        @foreach ($slides as $k => $v)
        <div class="single-hero-slide bg-img slide-background-overlay"
            style="background-image: url({{url('file')}}/{{@$slides->gambar[$k]['files'][0]['name']}});">
            <div class="container h-100">
                <div class="row h-100 align-items-end">
                    <div class="col-12">
                        <div class="hero-slides-content">
                            <div class="line"></div>
                            <h2>{{$v->judul}}</h2>
                            <p>{{$v->isi}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</section>
<!-- ***** Hero Area End ***** -->

<!-- ***** Portfolio Area Start ***** -->
<div class="portfolio-area section-padding-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="portfolio-title">
                    <h2>“Persembahan <span>Dinas Pariwisata</span> untuk masyarakat Temanggung”</h2>
                </div>
            </div>
        </div>
        <div class="cool-facts-area section-padding-100-0">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Single Cool Fact-->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-cool-fact-area text-center mb-100 wow fadeInUpBig" data-wow-delay="250ms">
                            <img src="{{url('assets/vendor/sonar')}}/img/core-img/golden-ratio.png" alt="">
                            <h2><span class="counter">149</span></h2>
                            <p>Wisata</p>
                        </div>
                    </div>
                    <!-- Single Cool Fact-->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-cool-fact-area text-center mb-100 wow fadeInUpBig" data-wow-delay="500ms">
                            <img src="{{url('assets/vendor/sonar')}}/img/core-img/canvas.png" alt="">
                            <h2><span class="counter">2391</span></h2>
                            <p>Kuliner</p>
                        </div>
                    </div>
                    <!-- Single Cool Fact-->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-cool-fact-area text-center mb-100 wow fadeInUpBig" data-wow-delay="750ms">
                            <img src="{{url('assets/vendor/sonar')}}/img/core-img/mouse.png" alt="">
                            <h2><span class="counter">245</span></h2>
                            <p>Budaya</p>
                        </div>
                    </div>
                    <!-- Single Cool Fact-->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-cool-fact-area text-center mb-100 wow fadeInUpBig" data-wow-delay="1000ms">
                            <img src="{{url('assets/vendor/sonar')}}/img/core-img/coffee.png" alt="">
                            <h2><span class="counter">128</span></h2>
                            <p>Event</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-between">
            <!-- Single Portfoio Area -->
            <div class="col-12 col-md-5">
                <div class="single-portfolio-item mt-100 portfolio-item-1 wow fadeIn">
                    <div class="backend-content">
                        <img class="dots" src="{{asset('/assets/vendor/sonar')}}/img/core-img/dots.png" alt="">
                        <h2>Kledung</h2>
                    </div>
                    <div class="portfolio-thumb">
                        <iframe width="560" height="315" src="{{Me::parsys('VIDEO1')}}" title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>

                    </div>
                    <div class="portfolio-meta">
                        <p class="portfolio-date">Feb 02, 2018</p>
                        <h2>Italy in the sunset</h2>
                    </div>
                </div>
            </div>
            {{--  <div class="col-12 col-md-5">
                <div class="single-portfolio-item mt-100 portfolio-item-1 wow fadeIn">
                    <div class="backend-content">
                        <img class="dots" src="{{asset('/assets/vendor/sonar')}}/img/core-img/dots.png" alt="">
            <h2>Kledung</h2>
        </div>
        <div class="portfolio-thumb">
            <img src="{{url('file')}}/{{@$slides->gambar[0]['files'][0]['name']}}" alt="kledung">
        </div>
        <div class="portfolio-meta">
            <p class="portfolio-date">Feb 02, 2018</p>
            <h2>Italy in the sunset</h2>
        </div>
    </div>
</div> --}}
<!-- Single Portfoio Area -->
<div class="col-12 col-md-6">
    <div class="single-portfolio-item mt-230 portfolio-item-2 wow fadeIn">
        <div class="backend-content">
            <img class="dots" src="{{asset('/assets/vendor/sonar')}}/img/core-img/dots.png" alt="">
        </div>
        <div class="portfolio-thumb">
            <img src="{{url('file')}}/{{@$slides->gambar[1]['files'][0]['name']}}" alt="">
        </div>
        <div class="portfolio-meta">
            <p class="portfolio-date">Feb 02, 2018</p>
            <h2>Mountain Landscape</h2>
        </div>
    </div>
</div>
</div>

<div class="row">
    <!-- Single Portfoio Area -->
    <div class="col-12 col-md-10">
        <div class="single-portfolio-item mt-100 portfolio-item-3 wow fadeIn">
            <div class="backend-content">
                <img class="dots" src="{{asset('/assets/vendor/sonar')}}/img/core-img/dots.png" alt="">
                <h2>Pariwisata Temanggung</h2>
            </div>
            <div class="portfolio-thumb">
                <iframe width="560" height="315" src="{{Me::parsys('VIDEO2')}}" title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
            <div class="portfolio-meta">
                <p class="portfolio-date">Nikmati suasana baru bersama keluarga</p>
                <h2>Embung Kledung</h2>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-end">
    <!-- Single Portfoio Area -->
    <div class="col-12 col-md-6">
        <div class="single-portfolio-item portfolio-item-4 wow fadeIn">
            <div class="backend-content">
                <img class="dots" src="{{asset('/assets/vendor/sonar')}}/img/core-img/dots.png" alt="">
            </div>
            <div class="portfolio-thumb">
                <img src="{{url('file')}}/{{@$slides->gambar[2]['files'][0]['name']}}" alt="">
            </div>
            <div class="portfolio-meta">
                <p class="portfolio-date">Feb 02, 2018</p>
                <h2>Clouds on mountain top</h2>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Single Portfoio Area -->
    <div class="col-12 col-md-5">
        <div class="single-portfolio-item portfolio-item-5 wow fadeIn">
            <div class="backend-content">
                <img class="dots" src="{{asset('/assets/vendor/sonar')}}/img/core-img/dots.png" alt="">
                <h2>Kali Progo</h2>
            </div>
            <div class="portfolio-thumb">
                <img src="{{url('file')}}/{{@$slides->gambar[3]['files'][0]['name']}}" alt="">
            </div>
            <div class="portfolio-meta">
                <p class="portfolio-date">Feb 02, 2018</p>
                <h2>Over the canion</h2>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <!-- Single Portfoio Area -->
    <div class="col-12 col-md-4">
        <div class="single-portfolio-item portfolio-item-6 wow fadeIn">
            <div class="portfolio-thumb">
                <img src="{{url('file')}}/{{@$slides->gambar[4]['files'][0]['name']}}" alt="">
            </div>
            <div class="portfolio-meta">
                <p class="portfolio-date">Feb 02, 2018</p>
                <h2>Mirror lake</h2>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-end">
    <!-- Single Portfoio Area -->
    <div class="col-12 col-md-4">
        <div class="single-portfolio-item portfolio-item-7 wow fadeIn">
            <div class="backend-content">
                <img class="dots" src="{{asset('/assets/vendor/sonar')}}/img/core-img/dots.png" alt="">
                <h2>Future</h2>
            </div>
            <div class="portfolio-thumb">
                <img src="{{url('file')}}/{{@$slides->gambar[5]['files'][0]['name']}}" alt="">
            </div>
            <div class="portfolio-meta">
                <p class="portfolio-date">Feb 02, 2018</p>
                <h2>Mirror lake</h2>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<!-- ***** Portfolio Area End ***** -->

<!-- ***** Call to Action Area Start ***** -->
<div class="sonar-call-to-action-area section-padding-0-100">
    <div class="backEnd-content">
        <h2>Curug Titang</h2>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="call-to-action-content wow fadeInUp" data-wow-delay="0.5s">
                    <h2>Dinas Pariwisata Kab. Temanggung</h2>
                    <h5>Jalan Jend. A.Yani Nomor 32 Temanggung</h5>
                    <a href="#" class="btn sonar-btn mt-100">saran masukan</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
			Dashboard.init();
</script>
<script>
    app.controller('mainCtrl', ['$scope', '$http', 'NgTableParams', 'SfService', 'FileUploader', function($scope, $http,
        NgTableParams, SfService, FileUploader) {
        SfService.setUrl("{{url('article')}}");
        $scope.m=[];
        $scope.h={};
        
       
        }]);
</script>
<script>
</script>
@endsection