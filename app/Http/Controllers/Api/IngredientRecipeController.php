<?php

namespace App\Http\Controllers\Api;

use App\Models\Recipe;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class IngredientRecipeController extends Controller
{
    public function index(Recipe $recipe): JsonResponse
    {
        return response()->json($recipe->ingredientRecipes()->get());
    }
}
