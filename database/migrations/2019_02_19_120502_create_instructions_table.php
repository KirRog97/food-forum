<?php

use App\Models\Recipe;
use App\Models\Picture;
use App\Models\Instrument;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('instructions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Recipe::class);
            $table->foreignIdFor(Picture::class);
            $table->foreignIdFor(Instrument::class)->nullable();
            $table->tinyInteger('order');
            $table->text('content');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('instructions');
    }
};
