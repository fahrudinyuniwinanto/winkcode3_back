<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSyLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sy_log', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('trs', 30)->nullable()->default('');
            $table->string('doc_no', 30)->nullable()->default('');
            $table->string('activity', 200)->nullable()->default('');
            $table->string('tag', 200)->nullable()->default('');
            $table->string('ip_client', 20)->nullable();
            $table->string('created_by', 15)->nullable()->default('');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable()->useCurrent();
            $table->softDeletes();
            $table->index(['trs', 'doc_no'], 'trs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sy_log');
    }
}
