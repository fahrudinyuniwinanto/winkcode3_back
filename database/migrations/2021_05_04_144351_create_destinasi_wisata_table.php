<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDestinasiWisataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destinasi_wisata', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nama_destinasi_wisata', 255)->nullable();
            $table->string('deskripsi', 500)->nullable();
            $table->string('alamat', 255)->nullable();
            $table->string('fasilitas', 255)->nullable();
            $table->string('kontak_person', 40)->nullable();
            $table->string('sosmed', 255)->nullable();
            $table->integer('id_kecamatan')->nullable();
            $table->integer('id_desa')->nullable();
            $table->string('note', 255)->nullable();
            $table->string('created_by', 20)->nullable();
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
        Schema::dropIfExists('destinasi_wisata');
    }
}
