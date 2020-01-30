<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    public function post()
    {
        return $this->hasMany('App\Post');
    }

    public function getDescNames()
    {
        return User::orderBy('name', 'desc');
    }

    public function getAscNames()
    {
        return User::orderBy('name', 'asc');
    }
}
