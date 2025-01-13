<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngredientRecipeTable extends Migration
{
    public function up(): void
    {
        Schema::create('ingredient_recipe', function (Blueprint $table) {
            $table->foreignId('recipe_id');
            $table->foreignId('ingredient_id');
            $table->integer('amount');
            $table->timestamps();

            $table->foreign('recipe_id')->references('id')->on('recipes')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('ingredient_id')->references('id')->on('ingredients')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ingredient_recipe');
    }
}
