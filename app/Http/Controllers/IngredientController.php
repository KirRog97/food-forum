<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;
use Inertia\Inertia;

class IngredientController extends Controller
{

    /**
     * Display a listing of all ingredients
     *
     * @param  \App\Models\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function index(Ingredient $ingredients)
    {
        $ingredients = Ingredient::orderBy('name', 'asc')->with('picture:id,path');

        return Inertia::render(
            'Ingredients/Index',
            [
                'ingredients' => $ingredients->paginate(10)
            ]
        );

        // return view(
        //     'ingredients.index',
        //     [
        //         'ingredients' => $ingredient->getAscNames()->paginate(10)
        //     ]
        // );
    }

    /**
     * Display a listing of posts witch using a particular ingredient.
     *
     * @param  \App\Models\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function usage(Ingredient $ingredient)
    {
        return Inertia::render(
            'Ingredients/IngredientUsage',
            [
                'ingredient' => $ingredient,
                'posts' => $ingredient->posts()->paginate(10)
            ]
        );

        // return view(
        //     'ingredients.usage',
        //     [
        //         'ingredient' => $ingredient,
        //         'posts' => $ingredient->posts()->paginate(10)
        //     ]
        // );
    }

    /**
     * Display the particular ingredient.
     *
     * @param  \App\Models\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function show(Ingredient $ingredient)
    {
        return Inertia::render(
            'Ingredients/Show',
            [
                'ingredient' => $ingredient,
            ]
        );

        // return view('ingredients.show', compact('ingredient'));
    }
}
