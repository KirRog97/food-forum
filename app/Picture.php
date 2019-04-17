<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $fillable = [
        'pic_path'
    ];

    protected $hidden = [];

    public function user()
    {
        return $this->hasMany('App\User', 'avatar_id');
    }

    public function post()
    {
        return $this->hasMany('App\Post');
    }

    public function ingredient()
    {
        return $this->hasMany('App\Ingredient');
    }

    // public function picture()
    // {
    //     return $this->morphTo();
    // }
}
