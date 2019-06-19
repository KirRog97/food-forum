<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    public function post()
    {
        return $this->belongsToMany('App\Post', 'post_ingredient', 'ingredient_id', 'post_id');
    }

    public function picture()
    {
        return $this->belongsTo('App\Picture', 'pic_id');
    }
}
