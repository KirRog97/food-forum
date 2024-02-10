<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;
use App\Models\Ingredient;

class IngredientController extends Controller
{

    /**
     * Display a listing of all ingredients
     *
     * @param  \App\Models\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function index(Ingredient $ingredients): Response
    {
        $ingredients = Ingredient::orderBy('name', 'asc')->with('picture:id,path');

        return Inertia::render(
            'Ingredients/Index',
            [
                'ingredients' => $ingredients->paginate(10)
            ]
        );
    }

    /**
     * Display a listing of posts witch using a particular ingredient.
     *
     * @param  \App\Models\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function usage(Ingredient $ingredient): Response
    {
        return Inertia::render(
            'Ingredients/IngredientUsage',
            [
                'ingredient' => $ingredient,
                'posts' => $ingredient->posts()->paginate(10)
            ]
        );
    }

    /**
     * Display the particular ingredient.
     *
     * @param  \App\Models\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function show(Ingredient $ingredient): Response
    {
        return Inertia::render(
            'Ingredients/Show',
            [
                'ingredient' => $ingredient,
            ]
        );
    }
}
