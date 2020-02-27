<?php

namespace App;

use \Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'username',
        'email',
        'avatar_id',
        'password',
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
        'username' => 'string',
        'email' => 'string',
        'avatar_id' => 'integer',
        'is_banned' => 'boolean',
        'email_verified_at' => 'datetime',
    ];

    public function getDescUsernames()
    {
        return User::orderBy('username', 'desc');
    }

    public function getAscUsernames()
    {
        return User::orderBy('username', 'asc');
    }

    public function hasOwnerRights($checkId)
    {
        return !Auth::guest() && Auth::user()->id === $checkId;
    }

    public function avatar()
    {
        return $this->belongsTo('App\Picture');
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
