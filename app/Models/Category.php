<?php

namespace App\Models;

use App\Models\Post;
use App\Models\Picture;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'picture_id',
        'description'
    ];

    protected $with = [
        'picture:id,path'
    ];

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
    public function picture(): BelongsTo
    {
        return $this->belongsTo(Picture::class, 'picture_id');
    }
}
