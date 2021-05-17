<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSyLinkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sy_link', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('rel', 30)->nullable()->default('');
            $table->string('key1', 30)->nullable()->default('');
            $table->string('key2', 30)->nullable()->default('');
            $table->string('key3', 30)->nullable()->default('');
            $table->string('key4', 30)->nullable()->default('');
            $table->string('key5', 30)->nullable()->default('');
            $table->string('tbl1', 30)->nullable()->default('');
            $table->string('tbl2', 30)->nullable()->default('');
            $table->string('tbl3', 30)->nullable()->default('');
            $table->string('tbl4', 30)->nullable()->default('');
            $table->string('tbl5', 30)->nullable()->default('');
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
        Schema::dropIfExists('sy_link');
    }
}
