<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;
use App\Models\Picture;
use App\Models\Ingredient;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class IngredientController extends Controller
{
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
     * Display a listing of recipes witch using a particular ingredient.
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
                'recipes' => $ingredient->recipes()->paginate(10)
            ]
        );
    }

    public function store(Request $request): RedirectResponse
    {
        $picture = Picture::create([
            'path' => '/storage/'.$request->file->store('categories', 'public'),
            'mime' => $request->file->getMimeType(),
            'size' => $request->file->getSize()
        ]);

        Ingredient::create([
            'name' => $request->name,
            'picture_id' => $picture->id,
            'description' => $request->description
        ]);

        return Redirect::route('home');
    }

    public function show(Ingredient $ingredient): Response
    {
        return Inertia::render(
            'Ingredients/Show',
            [
                'ingredient' => $ingredient->load(
                    'picture:id,path'
                ),
                'recipes' => $ingredient->recipes()->paginate(10)
            ]
        );
    }


    public function create(): Response
    {
        return Inertia::render('Ingredients/Create');
    }

    public function edit(Ingredient $ingredient): Response
    {
        return Inertia::render(
            'Ingredients/Edit',
            [
                'ingredient' => $ingredient->loadMissing('picture', 'recipes')
            ]
        );
    }

    public function update(Request $request, Ingredient $ingredient): RedirectResponse
    {
        $ingredient->fill($request->validate([
            'name' => 'required',
            'description' => 'required',
        ]));

        $ingredient->save();

        return Redirect::route('ingredients.show', $ingredient);
    }

    public function destroy(Ingredient $ingredient): RedirectResponse
    {
        $ingredient->delete();

        return Redirect::route('ingredients.index');
    }
}
