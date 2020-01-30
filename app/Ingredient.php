<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{

    /**
     * The model's default values for attributes.
     *
     * @var array
     */

    public function getDescNames()
    {
        return Ingredient::orderBy('name', 'desc');
    }

    public function getAscNames()
    {
        return Ingredient::orderBy('name', 'asc');
    }

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
