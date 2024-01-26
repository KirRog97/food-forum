<?php

namespace App\Models;

use App\Models\Post;
use App\Models\Picture;
use Laravel\Sanctum\HasApiTokens;
use \Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cog\Laravel\Love\Reacterable\Models\Traits\Reacterable;
use Cog\Contracts\Love\Reacterable\Models\Reacterable as ReacterableInterface;

class User extends Authenticatable implements ReacterableInterface
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

    /**
     * @method static UserEloquentBuilder query()
     */
    public function newEloquentBuilder($query): UserEloquentBuilder
    {
        return new UserEloquentBuilder($query);
    }

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


// https://github.com/cybercog/laravel-love/blob/master/UPGRADING.md#from-v8-to-v9

// https://github.com/cybercog/laravel-love/discussions/226#discussioncomment-4612667
class UserEloquentBuilder extends Builder
{
    use \Cog\Laravel\Love\Reactable\ReactableEloquentBuilderTrait;

    // Other User model local query scopes
}
