<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_ingredient', function (Blueprint $table) {           
            $table->unsignedInteger('post_id');
            $table->unsignedInteger('ingredient_id');
            $table->timestamps();         

            $table->foreign('post_id')->references('id')->on('posts')            
                ->onUpdate('cascade')->onDelete('cascade');
                
            $table->foreign('ingredient_id')->references('id')->on('ingredients')            
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
        Schema::dropIfExists('post_ingredients');
    }
}
