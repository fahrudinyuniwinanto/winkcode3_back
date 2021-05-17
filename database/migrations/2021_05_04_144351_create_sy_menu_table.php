<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSyMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sy_menu', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('label', 30)->nullable()->default('');
            $table->integer('redirect')->nullable()->default(0);
            $table->string('url', 100)->nullable()->default('');
            $table->integer('parent')->nullable()->default(0);
            $table->string('icon', 30)->nullable();
            $table->integer('order_no')->nullable();
            $table->string('note', 100)->nullable();
            $table->char('page', 1)->nullable();
            $table->string('created_by', 20)->nullable();
            $table->string('updated_by', 20)->nullable();
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
        Schema::dropIfExists('sy_menu');
    }
}
