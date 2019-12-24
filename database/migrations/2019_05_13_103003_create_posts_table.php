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
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('picture_id');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('kitchen_id');
            $table->unsignedInteger('dish_id');
            $table->unsignedInteger('menu_id');
            $table->text('instruction');
            $table->text('description');
            $table->integer('TTC');
            $table->integer('COP');
            $table->integer('Kcal');
            $table->boolean('is_banned')->default(0);
            $table->boolean('is_muted')->default(0);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('picture_id')->references('id')->on('pictures')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('kitchen_id')->references('id')->on('kitchens');
            $table->foreign('dish_id')->references('id')->on('dishes');
            $table->foreign('menu_id')->references('id')->on('menus');

        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
