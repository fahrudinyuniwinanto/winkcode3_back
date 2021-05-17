<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLokasiKulinerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lokasi_kuliner', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nama_tempat', 100)->nullable();
            $table->string('menu_unggulan', 100)->nullable();
            $table->string('pemilik', 100)->nullable();
            $table->string('alamat', 255)->nullable();
            $table->string('kontak_person', 40)->nullable();
            $table->string('koordinat', 255)->nullable();
            $table->string('sosmed', 255)->nullable();
            $table->integer('jenis')->nullable();
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
        Schema::dropIfExists('lokasi_kuliner');
    }
}
