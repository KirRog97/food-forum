<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->boolean('is_banned');
            $table->boolean('is_muted');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('picture_id');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('kitchen_id');
            $table->unsignedInteger('dish_id');
            $table->text('instruction');
            $table->text('desciption');
            $table->integer('TTC');
            $table->integer('COP');
            $table->integer('Kcal');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');

            $table->foreign('picture_id')->references('id')->on('pictures')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('category_id')->references('id')->on('categories')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('kitchen_id')->references('id')->on('kitchens')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('dish_id')->references('id')->on('dishes')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
