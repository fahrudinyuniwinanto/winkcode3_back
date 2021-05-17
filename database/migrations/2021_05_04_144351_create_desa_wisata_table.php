<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesaWisataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desa_wisata', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nama_desa_wisata', 100)->nullable();
            $table->string('alamat', 255)->nullable();
            $table->string('fasilitas', 255)->nullable();
            $table->string('kontak_person', 40)->nullable();
            $table->string('sosmed', 255)->nullable();
            $table->string('nomor_sk', 50)->nullable();
            $table->integer('klasifikasi')->nullable()->comment('rintisan, berkembang');
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
        Schema::dropIfExists('desa_wisata');
    }
}
