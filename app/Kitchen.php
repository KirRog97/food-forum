<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kitchen extends Model
{
    protected $table = 'kitchens';

    public function post()
    {
        return $this->hasMany('App\Post');
    }
}
