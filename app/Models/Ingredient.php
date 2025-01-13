<?php

namespace App\Models;

use App\Models\Recipe;
use App\Models\Picture;
use App\Models\IngredientRecipe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'picture_id',
        'description',
    ];

    public function recipes(): BelongsToMany
    {
        return $this->belongsToMany(Recipe::class)
            ->using(IngredientRecipe::class)
            ->withPivot(['amount']);
    }

    public function picture(): belongsTo
    {
        return $this->belongsTo(Picture::class, 'picture_id');
    }
}
