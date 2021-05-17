<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSyAccessCobaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sy_access_coba', function (Blueprint $table) {
            $table->string('accessid', 70)->default('')->unique('unique_accessname');
            $table->string('accessname', 255)->nullable();
            $table->string('accessgroup', 10)->default('')->comment('user or group');
            $table->string('location', 20)->nullable()->default('');
            $table->string('note', 50)->nullable()->default('');
            $table->string('created_by', 15)->nullable()->default('');
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
        Schema::dropIfExists('sy_access_coba');
    }
}
