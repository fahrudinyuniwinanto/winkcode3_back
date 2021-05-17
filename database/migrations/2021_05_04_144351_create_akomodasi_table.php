<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAkomodasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('akomodasi', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nama_homestay', 100)->nullable();
            $table->string('pemilik', 100)->nullable();
            $table->string('alamat', 255)->nullable();
            $table->string('kontak_person', 40)->nullable();
            $table->string('fasilitas', 255)->nullable();
            $table->integer('jumlah_kamar')->nullable();
            $table->bigInteger('harga')->nullable();
            $table->string('titik_koordinat', 255)->nullable();
            $table->string('sosmed', 255)->nullable();
            $table->integer('jenis_akomodasi')->nullable();
            $table->integer('jenis_kamar')->nullable();
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
        Schema::dropIfExists('akomodasi');
    }
}
