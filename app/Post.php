<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function kitchen()
    {
        return $this->belongsTo('App\Kitchen', 'kitchen_id');
    }

    public function description()
    {
        return $this->belongsTo('App\Post_description', 'description_id');
    }

    public function ingredients()
    {
        return $this->belongsToMany('App\Ingredient', 'post_ingredient', 'post_id', 'ingredient_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'author_id');
    }

    public function pictures()
    {
        return $this->morphMany('App\Picture', 'picture');
    }

    // public function picture()
    // {
    //     return $this->belongsTo('App\User', 'author_id');
    // }
}
