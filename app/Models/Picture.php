<?php

namespace App\Models;

use App\Models\Post;
use App\Models\User;
use App\Models\Ingredient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Picture extends Model
{
    use HasFactory;

    protected $fillable = [
        'path', 'mime', 'size'
    ];

    protected $hidden = [];

    public function ingredient()
    {
        return $this->hasMany(Ingredient::class);
    }

    public function post()
    {
        return $this->hasMany(Post::class, 'picture_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'avatar_id');
    }
}
