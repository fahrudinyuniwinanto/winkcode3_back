<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('jenis')->nullable();
            $table->string('nama_event', 255)->nullable();
            $table->dateTime('waktu')->nullable();
            $table->string('tempat', 100)->nullable();
            $table->string('koordinat', 100)->nullable();
            $table->string('deskripsi_rundown', 500)->nullable();
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
        Schema::dropIfExists('event');
    }
}
