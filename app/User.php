<?php

namespace App;

use \Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cog\Contracts\Love\Reacterable\Models\Reacterable as ReacterableContract;
use Cog\Laravel\Love\Reacterable\Models\Traits\Reacterable;

class User extends Authenticatable implements ReacterableContract
{
    use Notifiable;
    use Reacterable;

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

    public function getAllReactions()
    {
        $reacterFacade = $this->viaLoveReacter();
        return $reacterFacade->getReactions();
    }

    public function react($reactant)
    {
        $reacterFacade = $this->viaLoveReacter();

        if ($reacterFacade->hasReactedTo($reactant)) {
            $reacterFacade->unreactTo($reactant, 'Like');
            return 'UnLike';
        }

        if ($reacterFacade->hasNotReactedTo($reactant)) {
            $reacterFacade->reactTo($reactant, 'Like');
            return 'Like';
        }
    }

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
