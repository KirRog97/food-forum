<?php

namespace App\Models;

use App\Models\Post;
use App\Models\Picture;
use App\Models\Instrument;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Instruction extends Model
{
    use HasFactory;

    protected $fillable = [
        'order',
        'content',
        'picture_id',
    ];
    protected $with = ['instrument',];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function instrument(): BelongsTo
    {
        return $this->belongsTo(Instrument::class);
    }
    public function picture(): BelongsTo
    {
        return $this->belongsTo(Picture::class);
    }
}
