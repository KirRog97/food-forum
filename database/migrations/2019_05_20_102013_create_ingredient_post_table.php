<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngredientPostTable extends Migration
{
    public function up()
    {
        Schema::create('ingredient_post', function (Blueprint $table) {
            $table->foreignId('post_id');
            $table->foreignId('ingredient_id');
            $table->integer('amount');
            $table->timestamps();

            $table->foreign('post_id')->references('id')->on('posts')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('ingredient_id')->references('id')->on('ingredients')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ingredient_post');
    }
}
