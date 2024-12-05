<?php

use App\Models\Picture;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    public function up(): void
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignIdFor(Picture::class);
            $table->text('description');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
}
