<?php

namespace App\Http\Controllers\Api;

use App\Models\Recipe;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;

class RecipeController extends Controller
{
    /**
     * Display a listing of the 10 most liked Recipes.
     *
     */
    public function top(Recipe $recipe): Collection
    {
        return $recipe->getPopularRecipes();
    }

    public function new(Recipe $recipe): Collection
    {
        return $recipe->getNewestRecipes();
    }

    public function editorChoise(Recipe $recipe): Collection
    {
        return $recipe->getEditorsRecipes();
    }
}
