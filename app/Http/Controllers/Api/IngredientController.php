<?php

namespace App\Http\Controllers\Api;

use App\Models\Ingredient;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class IngredientController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Ingredient::select('id', 'name')->get());
    }
}
