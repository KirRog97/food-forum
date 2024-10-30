<?php

use App\Models\Picture;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngredientsTable extends Migration
{
    public function up(): void
    {
        Schema::create('ingredients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignIdFor(Picture::class);
            $table->text('description');
            $table->timestamps();

            $table->foreign('picture_id')->references('id')->on('pictures');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ingredients');
    }
}
