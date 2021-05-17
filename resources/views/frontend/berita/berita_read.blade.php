@extends('layout.frontend')
@section('content')
{{-- @dd($berita[0]->judul) --}}
<!-- Close Icon -->

<!-- ***** Header Area End ***** -->

<!-- ***** Hero Area Start ***** -->
<div class="hero-area d-flex align-items-center">

    <!-- Hero Thumbnail -->
    <div class="hero-thumbnail equalize bg-img" style="background-image: url(img/bg-img/blog.jpg);"></div>

    <!-- Hero Content -->

</div>
<!-- ***** Hero Area End ***** -->

<!-- ***** Blog Area Start ***** -->
<section class="sonar-blog-area section-padding-100">
    <!-- back end content -->
    <div class="backEnd-content">
        <img class="dots" src="img/core-img/dots.png" alt="">
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-9">
                <!-- Single Blog Area -->
                <div class="single-blog-area mb-100 wow fadeInUp" data-wow-delay="300ms">
                    <!-- Post Thumbnail -->
                    <div class="blog-post-thumbnail">

                        <?php foreach(isset($berita->gambar['files'])?$berita->gambar['files']:[] as $vv):?>
                        <img src="{{url('file/'.$vv['name'])}}" alt="">
                        @break
                        <?php  endforeach;?>
                        <!-- Post Date -->
                        <div class="post-date">
                            <a href="#">{{date_format($berita->created_at,"d M 'y")}}</a>
                        </div>
                    </div>
                    <!-- Post Content -->
                    <div class="post-content">
                        <a href="#" class="headline">{{$berita->judul}}</a>
                        <div class="post-meta">
                            <a href="#" class="comments">Ditulis oleh {{$berita->created_by}}</a> | <a href="#"
                                class="comments">2
                                Comments</a>
                        </div>
                        <p>{{$berita->isi}}</p>
                    </div>
                </div>

            </div>

            <div class="col-12 col-md-3">
                <div class="sonar-blog-sidebar-area">

                    <!-- Search Widget -->
                    <div class="search-widget-area mb-50">
                        <form action="#" method="get">
                            <input type="search" placeholder="Search">
                            <button type="submit"><i class="ti-search"></i></button>
                        </form>
                    </div>

                    <!-- Archive Widget -->
                    <div class="sonar-catagories-widget-area mb-50">
                        <h6>Terkini</h6>
                        <ul class="catagories-menu">
                            {{-- @dd($terkini) --}}
                            @foreach ($terkini as $t)
                            <li><a href="{{url('/berita/web/read/'.htmlentities($t->judul))}}">{{$t->judul}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Catagories Widget -->
                    <div class="sonar-catagories-widget-area mb-50">
                        <h6>Categories</h6>
                        <ul class="catagories-menu">
                            <li><a href="#">Uncategorized</a></li>
                            <li><a href="#">Usefull Information</a></li>
                            <li><a href="#">Events</a></li>
                            <li><a href="#">Business</a></li>
                            <li><a href="#">Marketing</a></li>
                            <li><a href="#">Conference &amp; Press</a></li>
                        </ul>
                    </div>

                    <!-- Latest News -->
                    <div class="latest-news-widget-area mb-50">
                        <h6>Latest News</h6>
                        <div class="widget-blog-post">
                            <!-- Single Blog Post -->
                            <div class="widget-single-blog-post d-flex align-items-start">
                                <div class="widget-post-thumbnail pr-3">
                                    <img src="img/blog-img/lp1.png" alt="">
                                </div>
                                <div class="widget-post-content">
                                    <a href="#">A simple blog post</a>
                                    <p>by Jane Smith / Jan 25, 2018</p>
                                </div>
                            </div>
                            <!-- Single Blog Post -->
                            <div class="widget-single-blog-post d-flex align-items-start">
                                <div class="widget-post-thumbnail pr-3">
                                    <img src="img/blog-img/lp2.png" alt="">
                                </div>
                                <div class="widget-post-content">
                                    <a href="#">Photography 101</a>
                                    <p>by Jane Smith / Jan 25, 2018</p>
                                </div>
                            </div>
                            <!-- Single Blog Post -->
                            <div class="widget-single-blog-post d-flex align-items-start">
                                <div class="widget-post-thumbnail pr-3">
                                    <img src="img/blog-img/lp3.png" alt="">
                                </div>
                                <div class="widget-post-content">
                                    <a href="#">Build your business</a>
                                    <p>by Jane Smith / Jan 25, 2018</p>
                                </div>
                            </div>
                            <!-- Single Blog Post -->
                            <div class="widget-single-blog-post d-flex align-items-start">
                                <div class="widget-post-thumbnail pr-3">
                                    <img src="img/blog-img/lp4.png" alt="">
                                </div>
                                <div class="widget-post-content">
                                    <a href="#">Wedding Photography</a>
                                    <p>by Jane Smith / Jan 25, 2018</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 text-center wow fadeInUp" data-wow-delay="500ms">
                <a href="#" class="btn sonar-btn">Load More</a>
            </div>
        </div>
    </div>
</section>
@endsection