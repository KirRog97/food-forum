<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('avatar_id');
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('is_banned')->default(false);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('avatar_id')->references('id')->on('pictures');
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
