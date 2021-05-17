<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCobaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coba', function (Blueprint $table) {
            $table->integer('id', true)->comment(' ');
            $table->string('nama', 255)->nullable();
            $table->string('keterangan', 255)->nullable();
            $table->string('created_by', 255)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->char('gender', 1)->nullable();
            $table->dateTime('date_born')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coba');
    }
}
