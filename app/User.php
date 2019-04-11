<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'email' => 'string',
        'avatar_id' => 'integer',
        'is_banned' => 'boolean',
        'email_verified_at' => 'datetime',
    ];

    public function avatar()
    {
        return $this->morphMany('App\Picture', 'picture');
    }
    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function like()
    {
        return $this->belongsTo('App\Like');
    }

    public function comment()
    {
        return $this->belongsTo('App\Comment');
    }
}
