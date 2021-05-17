<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desa', function (Blueprint $table) {
            $table->integer('id_desa', true);
            $table->string('desa', 50);
            $table->integer('id_kecamatan');
            $table->string('note', 200)->nullable();
            $table->string('created_by', 20)->nullable();
            $table->timestamps();
            $table->string('updated_by', 20)->nullable();
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
        Schema::dropIfExists('desa');
    }
}
