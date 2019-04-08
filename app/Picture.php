<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    // protected $fillable = [
    //     'pic_path',
    // ];


    protected $table = 'pictures';

    public function picture()
    {
        return $this->morphTo();
    }

    // public function user_avatars()
    // {
    //     return $this->hasMany('App\User','avatar_id');
    // }

    // public function post_pictures()
    // {
    //     return $this->belongToMany('App\Post');
    // }

    // public function ingredient_pictures()
    // {
    //     return $this->hasMany('App\Ingredient');
    // }

}
