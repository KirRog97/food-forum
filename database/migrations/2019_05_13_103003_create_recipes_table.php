<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipesTable extends Migration
{
    public function up(): void
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('user_id');
            $table->foreignId('picture_id');
            $table->foreignId('category_id');
            $table->foreignId('kitchen_id');
            $table->foreignId('dish_id');
            $table->foreignId('menu_id');
            $table->text('description');
            $table->integer('TTC');
            $table->integer('COP');
            $table->integer('Kcal');
            $table->boolean('is_banned')->default(0);
            $table->boolean('is_muted')->default(0);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('picture_id')->references('id')->on('pictures')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('kitchen_id')->references('id')->on('kitchens')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('dish_id')->references('id')->on('dishes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('menu_id')->references('id')->on('menus')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
}
