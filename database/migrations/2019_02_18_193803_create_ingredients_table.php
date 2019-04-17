<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngredientsTable extends Migration
{
    public function up()
    {
        Schema::create('ingredients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->unsignedInteger('pic_id');
            $table->timestamps();

            $table->foreign('pic_id')->references('id')->on('pictures');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ingredients');
    }
}