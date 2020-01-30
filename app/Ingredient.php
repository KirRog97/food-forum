<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    public function posts()
    {
        return $this->belongsToMany('App\Post')
            ->using('App\IngredientPost')
            ->withPivot(['amount']);
    }

    public function picture()
    {
        return $this->belongsTo('App\Picture', 'picture_id');
    }
}
