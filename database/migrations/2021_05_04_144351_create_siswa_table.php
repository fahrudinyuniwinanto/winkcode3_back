<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->integer('id_siswa', true);
            $table->string('fullname', 250)->nullable();
            $table->string('nik', 30)->nullable();
            $table->string('email', 250)->nullable();
            $table->dateTime('tanggal_masuk')->nullable();
            $table->string('foto', 250)->nullable();
            $table->string('nomor_telp', 14)->nullable();
            $table->integer('alumni')->default(1)->comment('1=siswa,0=alumni');
            $table->text('note');
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('siswa');
    }
}
