<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEkrafTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ekraf', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('pelaku', 100)->nullable();
            $table->string('produk', 255)->nullable();
            $table->string('alamat', 255)->nullable();
            $table->string('kontak_person', 100)->nullable();
            $table->integer('jenis')->nullable();
            $table->string('koordinat', 255)->nullable();
            $table->string('note', 255)->nullable()->comment('deskripsi produk');
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
        Schema::dropIfExists('ekraf');
    }
}
