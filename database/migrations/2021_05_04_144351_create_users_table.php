<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_group', 255)->nullable()->default('1');
            $table->string('password')->nullable();
            $table->string('username', 20)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('nama_lengkap')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('gender', 2)->nullable();
            $table->string('nomor_hp', 20);
            $table->string('note', 255)->nullable();
            $table->dateTime('last_login')->nullable();
            $table->string('ip_login', 100)->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
