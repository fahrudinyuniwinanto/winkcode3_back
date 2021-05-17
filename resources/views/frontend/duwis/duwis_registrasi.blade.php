@extends('layout.frontend')
@section('content')

<div class="hero-area d-flex align-items-center">

    <!-- Hero Thumbnail -->
    <div class="hero-thumbnail equalize bg-img"
        style="background-image: url({{url('file/assets/uploads/default.jpg')}});"></div>

    <!-- Hero Content -->
    <div class="hero-content equalize">
        <div class="container-fluid h-100">
            <div class="row h-100 align-items-center justify-content-center">
                <div class="col-12 col-md-8">
                    <div class="line"></div>
                    <h2>Duta Wisata</h2>
                    <p>Kabupaten Temanggung</p>
                    <a href="#form-duwis" class="btn sonar-btn white-btn">Daftar Sekarang</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ***** Hero Area End ***** -->

<section class="sonar-contact-area section-padding-100" id="form-duwis">
    <!-- back end content -->
    <div class="backEnd-content">
        <img class="dots" src="img/core-img/dots.png" alt="">
    </div>

    <div class="container">
        <div class="row">
            <!-- Contact Form Area -->
            <div class="col-12">
                <div class="contact-form text-center">

                    <h4>Form Pendaftaran Mas dan Mbak Duta Wisata Kabupaten Temanggung Tahun 2019</h4>
                    {{-- menampilkan error validasi --}}
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{url('/duwis/registrasi/action')}}" method="post">
                        @csrf
                        <div class="row">

                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" name="nama_lengkap" value="" id="nama_lengkap"
                                        class="form-control input-sm" maxlength="191">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label>Nama Panggilan</label>
                                    <input type="text" name="nama_panggilan" id="nama_panggilan"
                                        class="form-control input-sm" maxlength="191">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label>Nomor Telepon</label>
                                    <input type="text" name="nomor_telp" id="nomor_telp"
                                        class="form-control input-sm numeric" maxlength="20">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" id="email" class="form-control input-sm"
                                        maxlength="191">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" name="alamat" id="alamat" class="form-control input-sm"
                                        maxlength="191">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label>Tempat Lahir</label>
                                    <input type="text" name="tempat_lahir" id="tempat_lahir"
                                        class="form-control input-sm" maxlength="191">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="text" name="tanggal_lahir" id="tanggal_lahir"
                                        class="form-control input-sm date" maxlength="10" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label>Bahasa Lisan yang dikuasai</label>
                                    <input type="text" name="bahasa_lisan" id="bahasa_lisan"
                                        class="form-control input-sm" maxlength="191">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label>Bahasa yang dikuasai (tulisan)</label>
                                    <input type="text" name="bahasa_tulisan" id="bahasa_tulisan"
                                        class="form-control input-sm" maxlength="191">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label>Pekerjaan dan Posisi</label>
                                    <input type="text" name="pekerjaan" id="pekerjaan" class="form-control input-sm"
                                        maxlength="191">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label>Sekolah atau Perguruan Tinggi</label>
                                    <input type="text" name="nama_sekolah" id="nama_sekolah"
                                        class="form-control input-sm" maxlength="191">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label>Pendidikan Terakhir</label>
                                    <?=formDropDown('pendidikan_terakhir',$data_pendidikan_terakhir,'D3',['class'=>'form-control','id'=>'pendidikan_terakhir'])?>
                                    {{-- <input type="text" name="pendidikan_terkahir" id="pendidikan_terkahir"
                                        class="form-control input-sm" maxlength="191"> --}}
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label>Tinggi Badan</label>
                                    <input type="text" name="tinggi_badan" id="tinggi_badan"
                                        class="form-control input-sm numeric" maxlength="5"
                                        placeholder="dalam satuan senti meter">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label>Berat Badan</label>
                                    <input type="text" name="berat_badan" id="berat_badan" class="form-control input-sm"
                                        maxlength="5" placeholder="dalam satuan kilo gram">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label>Hobi</label>
                                    <input type="text" name="hobi" id="hobi" class="form-control input-sm"
                                        maxlength="191">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label>Ambisi</label>
                                    <input type="text" name="ambisi" id="ambisi" class="form-control input-sm"
                                        maxlength="191">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label>Gelar Juara</label>
                                    <input type="text" name="kejuaraan_diraih" id="kejuaraan_diraih"
                                        class="form-control input-sm" maxlength="191">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label>Nama Ayah</label>
                                    <input type="text" name="nama_ayah" id="nama_ayah"
                                        class="form-control input-sm letteric" maxlength="191">

                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label>Nama Ibu</label>
                                    <input type="text" name="nama_ibu" id="nama_ibu"
                                        class="form-control input-sm letteric" maxlength="191">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label>Alamat Orang Tua</label>
                                    <input type="text" name="alamat_orang_tua" id="alamat_orang_tua"
                                        class="form-control input-sm" maxlength="191">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label>Nomor Telepon Orang Tua</label>
                                    <input type="text" name="nomor_telp_orang_tua" id="nomor_telp_orang_tua"
                                        class="form-control input-sm numeric" maxlength="16">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label>Tempat Wisata Favorit</label>
                                    <input type="text" name="tempat_favorit" id="tempat_favorit"
                                        class="form-control input-sm" maxlength="191">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label>Alasan Memilih Tempat Wisata Tersebut</label>
                                    <textarea name="alasan_tempat_favorit" id="alasan_tempat_favorit"
                                        class="form-control input-sm" maxlength="300"></textarea>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label>Orang Tua yang dapat dihubungi </label>
                                    <input type="text" name="nomor_telp_darurat" id="nomor_telp_darurat"
                                        class="form-control input-sm" maxlength="191"
                                        placeholder="dalam keadaan darurat">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label>Golongan Darah</label>
                                    <x-combo name="golongan_darah" :options="['A'=>'A','B'=>'B']"
                                        :default="old(@$golongan_darah)" />
                                </div>
                            </div>
                            <div class=" col-12 col-md-4">
                                <div class="form-group">
                                    <label>Pernah Sakit Keras?</label>
                                    <x-combo name="pernah_sakit_keras" :options="[1=>'Ya',0=>'Belum']"
                                        :default="old(@$pernah_sakit_keras)" />
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label>Jika Pernah, Tuliskan deskripsi sakitnya</label>
                                    <input type="text" name="deskripsi_sakit_keras" id="deskripsi_sakit_keras"
                                        class="form-control input-sm" maxlength="500">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label>Upload KTP</label>
                                    <input type="file" name="ktp" id="ktp" class="form-control input-sm">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label>Upload Foto (Ukuran Postcard)</label>
                                    <input type="file" name="foto" id="foto" class="form-control input-sm">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label>Captcha</label>

                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn sonar-btn">Simpan</button>
                                <button type="button" class="btn sonar-btn">Batal</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection