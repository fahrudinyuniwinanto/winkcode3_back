<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaketWisataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paket_wisata', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nama_paket_wisata', 100)->nullable();
            $table->string('deskripsi', 255)->nullable();
            $table->bigInteger('harga')->nullable();
            $table->string('alamat', 255)->nullable();
            $table->string('kontak_person', 100)->nullable();
            $table->string('titik_koordinat', 255)->nullable();
            $table->string('note', 255)->nullable();
            $table->string('created_by', 20)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->integer('id_destinasi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paket_wisata');
    }
}
