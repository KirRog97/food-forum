<?php

namespace App\Models;

use App\Models\Picture;
use App\Models\Instruction;
use App\Models\InstructionInstrument;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Instrument extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'picture_id',
    ];

    public function instruction(): BelongsToMany
    {
        return $this->belongsToMany(Instruction::class)
            ->using(InstructionInstrument::class);
    }

    public function picture(): BelongsTo
    {
        return $this->belongsTo(Picture::class, 'picture_id');
    }
}
