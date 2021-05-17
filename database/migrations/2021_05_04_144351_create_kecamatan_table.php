<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKecamatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kecamatan', function (Blueprint $table) {
            $table->integer('id_kecamatan', true);
            $table->string('kecamatan', 50);
            $table->integer('id_kabupaten')->default(0);
            $table->string('note', 20)->nullable();
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
        Schema::dropIfExists('kecamatan');
    }
}
