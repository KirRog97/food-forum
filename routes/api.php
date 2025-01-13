<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\DishController;
use App\Http\Controllers\Api\IngredientController;
use App\Http\Controllers\Api\IngredientRecipeController;
use App\Http\Controllers\Api\KitchenController;
use App\Http\Controllers\Api\MenuController;
use App\Http\Controllers\Api\RecipeController;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('categories', [CategoryController::class, 'index']);
Route::get('ingredients', [IngredientController::class, 'index']);
Route::get('dishes', [DishController::class, 'index']);
Route::get('kitchens', [KitchenController::class, 'index']);
Route::get('menus', [MenuController::class, 'index']);


Route::group(
    ['prefix' => 'recipes'],
    function () {
        Route::get('/{recipe}/ingredients', [IngredientRecipeController::class, 'index']);
        Route::get('favorites/editor-choice', [RecipeController::class, 'editorChoise']);
        Route::get('/favorites/top', [RecipeController::class, 'top']);
        Route::get('/new', [RecipeController::class, 'new']);
    }
);
