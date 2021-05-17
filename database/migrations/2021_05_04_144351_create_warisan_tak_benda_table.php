<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarisanTakBendaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warisan_tak_benda', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nama_warisan_tak_benda', 255)->nullable();
            $table->string('alamat', 255)->nullable();
            $table->string('latar_belakang', 1000)->nullable();
            $table->string('kontak_person', 100)->nullable();
            $table->string('koordinat', 255)->nullable();
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
        Schema::dropIfExists('warisan_tak_benda');
    }
}
