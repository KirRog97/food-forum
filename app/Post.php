<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'picture_id',
        'title',
        'category_id',
        'kitchen_id',
        'dish_id',
        'menu_id',
        'TTC',
        'COP',
        'Kcal',
        'instruction',
        'description',
        'is_banned',
        'is_muted'
    ];

    /**
     * The attributes that should be cast to native types.
     * https://laravel.com/docs/5.8/eloquent-mutators#attribute-casting
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'instruction' => 'string',
        'description' => 'string',

        'user_id' => 'integer',
        'picture_id' => 'integer',
        'category_id' => 'integer',
        'kitchen_id' => 'integer',
        'dish_id' => 'integer',
        'menu_id' => 'integer',

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
        return $this->belongsTo('App\Picture', 'picture_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function kitchen()
    {
        return $this->belongsTo('App\Kitchen', 'kitchen_id');
    }

    public function dish()
    {
        return $this->belongsTo('App\Dish', 'dish_id');
    }

    public function menu()
    {
        return $this->belongsTo('App\Menu', 'menu_id');
    }

    public function ingredients()
    {
        return $this->belongsToMany('App\Ingredient')
            ->using('App\IngredientPost')
            ->withPivot(['amount']);
    }
}
