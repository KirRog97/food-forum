<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Inertia\Inertia;
use Inertia\Response;
use App\Http\Requests\StoreRecipe;
use App\Http\Requests\UpdateRecipe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class RecipeController extends Controller
{
    public function index(Recipe $recipes): Response
    {
        return Inertia::render(
            'Recipes/Index',
            [
                'recipes' => $recipes->orderBy('title', 'asc')
                    ->paginate(10)
            ]
        );
    }

    /**
     * Display a top-10 of the popular recipes witch have more likes.
     *
     */
    public function popularRecipes(Recipe $recipe): Response
    {
        return Inertia::render(
            'Recipes/RecipesPopular',
            [
                'recipes' => $recipe->getPopularRecipes()
            ]
        );
    }

    public function create(): Response
    {
        return Inertia::render('Recipes/Create');
    }


    public function store(StoreRecipe $request): RedirectResponse
    {
        $ingredients = session('recipe_ing');

        $recipe = Recipe::create(
            [
                'user_id' => Auth::user()->id,
                'picture_id' => session('picture_id'),
                'category_id' => $request->recipe_category_id,
                'kitchen_id' => $request->recipe_kitchen_id,
                'dish_id' => $request->recipe_dish_id,
                'menu_id' => $request->recipe_menu_id,
                'title' => $request->title,
                'description' => $request->description,
                'instruction' => $request->instruction,
                'TTC' => $request->TTC,
                'COP' => $request->COP,
                'Kcal' => $request->Kcal
            ]
        );

        foreach ($ingredients as $ingredient) {
            $recipe->ingredientRecipes()->attach(
                1,
                [
                    'recipe_id' => $recipe->id,
                    'ingredient_id' => $ingredient['ingredient_id'],
                    'amount' => $ingredient['amount'],
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            );
        }

        $request->session()->forget('picture_id');
        $request->session()->forget('recipe_ing');

        return redirect()->route('recipes.index')
            ->with('success', 'Ваш рецепт успешно создан');
    }


    public function show(Recipe $recipe): Response
    {
        return Inertia::render(
            'Recipes/Show',
            [
                'recipe' => $recipe->loadMissing(
                    [
                        'category:id,name',
                        'kitchen:id,name',
                        'dish:id,name',
                        'menu:id,name',
                        'ingredientRecipes.picture',
                        'instructions.picture:id,path',
                        'instructions.instrument:id,name,description',
                        'instructions.instrument.picture:id,path',
                        'pictures',
                        'user',
                    ]
                )
            ]
        );
    }


    public function edit(Recipe $recipe): Response
    {
        return Inertia::render(
            'Recipes/Edit',
            [
                'recipe' => $recipe->loadMissing(
                    [
                        'category:id,name',
                        'kitchen:id,name',
                        'dish:id,name',
                        'menu:id,name',
                        'pictures:id,path',
                        'ingredientRecipes.picture',
                        'instructions.picture',
                        'instructions.instrument'
                    ]
                )
            ]
        );
    }

    public function update(UpdateRecipe $request, Recipe $recipe)
    {
        $recipe = Recipe::find($recipe->id);
        $recipe->title = $request->input('title');
        $recipe->description = $request->input('description');
        $recipe->COP = $request->input('COP');
        $recipe->TTC = $request->input('TTC');
        $recipe->Kcal = $request->input('Kcal');
        $recipe->save();

        return redirect()->route('recipes.index')
            ->with('success', 'Внесенные изменения сохранены');
    }

    public function destroy(Recipe $recipe): RedirectResponse
    {
        Recipe::destroy($recipe->id);
        return redirect()->route('recipes.index')
            ->with('success', 'Рецепт удален');
    }
}
