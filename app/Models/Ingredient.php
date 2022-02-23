<?php

namespace App\Models;

use App\Models\Post;
use App\Models\Picture;
use App\Models\IngredientPost;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'picture_id',
        'description',
    ];

    public function posts()
    {
        return $this->belongsToMany(Post::class)
            ->using(IngredientPost::class)
            ->withPivot(['amount']);
    }

    public function picture()
    {
        return $this->belongsTo(Picture::class, 'picture_id');
    }
}
