<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that should be cast to native types.
     * https://laravel.com/docs/5.8/eloquent-mutators#attribute-casting
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'instruction' => 'string',
        'desciption' => 'string',

        'user_id' => 'integer',
        'picture_id' => 'integer',
        'category_id' => 'integer',
        'kitchen_id' => 'integer',
        'dish_id' => 'integer',
        'TTC' => 'integer',
        'COP' => 'integer',
        'Kcal' => 'integer',

        'is_banned' => 'boolean',
        'is_muted' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function pictures()
    {
        return $this->morphMany('App\Picture', 'picture');
    }

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function kitchen()
    {
        return $this->belongsTo('App\Kitchen', 'kitchen_id');
    }

    public function ingredients()
    {
        return $this->belongsToMany('App\Ingredient', 'post_ingredient', 'post_id', 'ingredient_id');
    }

    public function like()
    {
        return $this->belongsTo('App\Like');
    }
    public function comment()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
