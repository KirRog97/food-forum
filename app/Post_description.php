<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post_description extends Model
{
    public function post_descriptions()
    {
        return $this->belongToMany('App\Post');
    }

}
