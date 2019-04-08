<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('author_id');
            $table->unsignedInteger('picture_id');            
            $table->unsignedInteger('description_id');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('kitchen_id');
            $table->string('title');
            $table->string('TTC');
            $table->integer('COP');
            $table->integer('Kcal');
            $table->text('instruction');    
            $table->timestamps();    
            
            $table->foreign('author_id')->references('id')->on('users');
            
            $table->foreign('picture_id')->references('id')->on('pictures')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('description_id')->references('id')->on('post_descriptions')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('category_id')->references('id')->on('categories')
                ->onUpdate('cascade')->onDelete('cascade');
                
            $table->foreign('kitchen_id')->references('id')->on('ingredients')
                ->onUpdate('cascade')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
