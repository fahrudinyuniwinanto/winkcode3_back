<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMakananKhasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('makanan_khas', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nama_produk', 100)->nullable();
            $table->string('nama_produsen', 100)->nullable();
            $table->string('bahan', 255)->nullable();
            $table->string('alamat', 255)->nullable();
            $table->integer('jenis')->nullable();
            $table->string('kontak_person', 40)->nullable();
            $table->string('koordinat', 100)->nullable();
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
        Schema::dropIfExists('makanan_khas');
    }
}
