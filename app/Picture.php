<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $fillable = [
        'path', 'mime', 'size'
    ];

    protected $hidden = [];

    public function user()
    {
        return $this->hasMany('App\User', 'avatar_id');
    }

    public function post()
    {
        return $this->hasMany('App\Post', 'picture_id');
    }

    public function ingredient()
    {
        return $this->hasMany('App\Ingredient');
    }
}
