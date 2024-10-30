<?php

namespace App\Models;

use App\Models\Post;
use App\Models\Picture;
use App\Models\IngredientPost;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'picture_id',
        'description',
    ];

    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class)
            ->using(IngredientPost::class)
            ->withPivot(['amount']);
    }

    public function picture(): belongsTo
    {
        return $this->belongsTo(Picture::class, 'picture_id');
    }
}
