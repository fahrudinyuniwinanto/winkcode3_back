@extends('layout.frontend')
@section('content')
{{-- @dd($berita[0]->judul) --}}
<!-- Close Icon -->
<div class="hero-area d-flex align-items-center" style=" overflow: hidden; ">

    <!-- Hero Thumbnail -->
    <div class="hero-thumbnail equalize bg-img"
        style="background-image: url({{url('file/assets/uploads/default.jpg')}});"></div>

    <!-- Hero Content -->
    <div class="hero-content equalize">
        <div class="container-fluid h-100">
            <div class="row h-100 align-items-center justify-content-center">
                <div class="col-12 col-md-8">
                    <div class="line"></div>
                    <h2>Berita</h2>
                    <p>Kabupaten Temanggung</p>
                    <a href="#form-duwis" class="btn sonar-btn white-btn">Lihat semua</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ***** Header Area End ***** -->
<section class="sonar-projects-area" id="projects">
    <div class="container-fluid">
        <div class="row sonar-portfolio">
            @foreach ($terkini as $v)
            <!-- Single gallery Item -->
            <div class="col-12 col-sm-6 col-lg-3 single_gallery_item landscapes studio wow fadeInUpBig"
                data-wow-delay="300ms">
                @if(@$v->gambar['files'][0]['name']!="")
                <img src="{{url('file/'.@$v->gambar['files'][0]['name'])}}" alt="">
                @else
                <img src="{{url('file/assets/uploads/default.jpg')}}" alt="">
                @endif
                <!-- Gallery Content -->
                <div class="gallery-content">
                    <h4>{{$v->judul}}</h4>
                    <p>{{$v->deskripsi}}</p>
                </div>
            </div>

            @endforeach
        </div>

        <div class="row">
            <div class="col-12 text-center">
                <a href="#" class="btn sonar-btn">Lihat Semua</a>
            </div>
        </div>
    </div>
</section>
@endsection