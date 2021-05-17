<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDuwisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('duwis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_lengkap', 100)->nullable();
            $table->string('nama_panggilan', 20)->nullable();
            $table->string('nomor_telp', 20)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('alamat', 200)->nullable();
            $table->string('tempat_lahir', 200)->nullable();
            $table->dateTime('tanggal_lahir')->nullable();
            $table->string('bahasa_lisan', 50)->nullable();
            $table->string('bahasa_tulisan', 50)->nullable();
            $table->string('pekerjaan', 50)->nullable();
            $table->string('nama_sekolah')->nullable();
            $table->string('pendidikan_terkahir')->nullable();
            $table->integer('tinggi_badan')->nullable()->comment('cm');
            $table->binary('berat_badan')->nullable()->comment('kg');
            $table->char('golongan_darah', 2)->nullable();
            $table->string('hobi')->nullable();
            $table->string('ambisi')->nullable();
            $table->string('kejuaraan_diraih')->nullable();
            $table->string('nama_ayah', 50)->nullable();
            $table->string('nama_ibu', 50)->nullable();
            $table->string('alamat_orang_tua', 300)->nullable();
            $table->string('orang_tua_darurat', 20)->nullable()->comment('orang tua yg dihubungi dalam keadaan darurat');
            $table->string('tempat_favorit', 20)->nullable();
            $table->string('alasan_tempat_favorit', 300)->nullable();
            $table->string('nomor_telp_darurat', 20)->nullable();
            $table->integer('pernah_sakit_keras')->nullable();
            $table->string('deskripsi_sakit_keras', 300)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('duwis');
    }
}
