<?php

namespace App\Models;

use \Illuminate\Support\Facades\Auth;
use App\Models\Picture;
use App\Models\Post;
use Cog\Contracts\Love\Reacterable\Models\Reacterable as ReacterableContract;
use Cog\Laravel\Love\Reacterable\Models\Traits\Reacterable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements ReacterableContract
{
    use HasApiTokens, HasFactory, Notifiable;
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

    public function react($reactant, $reactionType = 'Like')
    {
        $reacterFacade = $this->viaLoveReacter();

        if ($reacterFacade->hasNotReactedTo($reactant)) {
            $reacterFacade->reactTo($reactant, $reactionType);
            return true;
        } else {
            $reacterFacade->unreactTo($reactant, $reactionType);
            return false;
        }
    }

    public function hasOwnerRights($checkId)
    {
        return !Auth::guest() && Auth::user()->id === $checkId;
    }

    public function avatar()
    {
        return $this->belongsTo(Picture::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
