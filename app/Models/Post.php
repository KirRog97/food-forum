<?php

namespace App\Models;

use App\Models\Dish;
use App\Models\Menu;
use App\Models\User;
use App\Models\Kitchen;
use App\Models\Picture;
use App\Models\Category;
use App\Models\Ingredient;
use App\Models\IngredientPost;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cog\Laravel\Love\Reactable\Models\Traits\Reactable;
use Cog\Contracts\Love\Reactable\Models\Reactable as ReactableContract;



class Post extends Model implements ReactableContract
{
    use HasFactory, Reactable;

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

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = [
        'pictures:id,path',
        'user',
        'user.avatar:id,path'
    ];

    public function isReactedByUser($user)
    {
        $reactantFacade = $this->viaLoveReactant();
        $isReacted = $reactantFacade->isReactedBy($user, 'Like', 1.0);
        return $isReacted;
    }

    public function likeCount()
    {
        $reactantFacade = $this->viaLoveReactant();
        $likeCount = $reactantFacade->getReactionCounterOfType('Like')->getCount();
        return $likeCount;
    }

    public function getPopularPosts()
    {
        return Cache::remember(
            'popular_posts',
            now()->addMinutes(30),
            function () {
                return Post::query()
                    ->joinReactionCounterOfType('Like')
                    ->orderBy('reaction_like_count', 'desc')
                    ->limit(10)
                    ->get();
            }
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function pictures()
    {
        return $this->belongsTo(Picture::class, 'picture_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function kitchen()
    {
        return $this->belongsTo(Kitchen::class, 'kitchen_id');
    }

    public function dish()
    {
        return $this->belongsTo(Dish::class, 'dish_id');
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }

    // Name of fucn chaind with factory
    public function ingredientPosts()
    {
        return $this->belongsToMany(Ingredient::class,)
            ->using(IngredientPost::class)
            ->withPivot('amount')
            ->withTimestamps();
    }
}
