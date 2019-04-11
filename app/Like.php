<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function user()
    {
        return $this->hasMany('App\User');
    }

    public function post()
    {
        return $this->hasMany('App\Post');
    }
}
