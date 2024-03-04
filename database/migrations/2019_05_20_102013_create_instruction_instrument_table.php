<?php

use App\Models\Instruction;
use App\Models\Instrument;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstructionInstrumentTable extends Migration
{
    public function up(): void
    {
        Schema::create('instruction_instrument', function (Blueprint $table) {
            $table->foreignIdFor(Instruction::class);
            $table->foreignIdFor(Instrument::class);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('instruction_instrument');
    }
}
