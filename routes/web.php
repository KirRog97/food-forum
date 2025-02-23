<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DishController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KitchenController;
use App\Http\Controllers\PictureController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\InstrumentController;

Route::redirect('/', '/home');

Route::get(
    '/home',
    function () {
        return Inertia::render('Home');
    }
)->name('home');

Route::controller(UserController::class)
    ->prefix('users')
    ->name('users.')
    ->middleware('auth')
    ->group(function () {
        Route::get('{user}/edit', 'edit')->name('edit');
        Route::put('{user}/update', 'update')->name('update');
        Route::delete('{user}/delete', 'destroy')->name('destroy');
    });
Route::controller(controller: UserController::class)
    ->prefix('users')
    ->name('users.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('{user}', 'show')->name('show');
        Route::get('{user}/favorites', 'recipesLikedByUser')->name('recipesLikedByUser');
        Route::get('{user}/recipes', 'recipesCreatedByUser')->name('recipesCreatedByUser');
    });

Route::controller(IngredientController::class)
    ->prefix('ingredients')
    ->name('ingredients.')
    ->middleware('auth')
    ->group(function () {
        Route::get('/create', 'create')->name('create');
        Route::post('/{ingredient}/store', 'store')->name('store');
        Route::get('/{ingredient}/edit', 'edit')->name('edit');
        Route::put('/{ingredient}/update', 'update')->name('update');
        Route::delete('/{ingredient}/destroy', 'destroy')->name('destroy');
    });
Route::controller(IngredientController::class)
    ->prefix('ingredients')
    ->name('ingredients.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{ingredient}', 'show')->name('show');
        Route::get('/ingredients/{ingredient}/usage', 'usage')->name('usage');
    });

Route::controller(CategoryController::class)
    ->prefix('categories')
    ->name('categories.')->middleware('auth')
    ->group(function () {
        Route::get('create', 'create')->name('create');
        Route::post('{category}/store', 'store')->name('store');
        Route::get('{category}/edit', 'edit')->name('edit');
        Route::put('{category}/update', 'update')->name('update');
        Route::delete('{category}/destroy', 'destroy')->name('destroy');
    });
Route::get('categories/{category}', action: [CategoryController::class, 'show'])->name('categories.show');

Route::controller(KitchenController::class)
    ->prefix('kitchens')
    ->name('kitchens.')->middleware('auth')
    ->group(function () {
        Route::get('create', 'create')->name('create');
        Route::post('{kitchen}/store', 'store')->name('store');
        Route::get('{kitchen}/edit', 'edit')->name('edit');
        Route::put('{kitchen}/update', 'update')->name('update');
        Route::delete('{kitchen}/destroy', 'destroy')->name('destroy');
    });
Route::get('kitchens/{kitchen}', action: [KitchenController::class, 'show'])->name('kitchens.show');

Route::controller(MenuController::class)
    ->prefix('menus')
    ->name('menus.')->middleware('auth')
    ->group(function () {
        Route::get('create', 'create')->name('create');
        Route::post('{menu}/store', 'store')->name('store');
        Route::get('{menu}/edit', 'edit')->name('edit');
        Route::put('{menu}/update', 'update')->name('update');
        Route::delete('{menu}/destroy', 'destroy')->name('destroy');
    });
Route::get('menus/{menu}', action: [MenuController::class, 'show'])->name('menus.show');

Route::controller(DishController::class)
    ->prefix('dishes')
    ->name('dishes.')
    ->group(function () {
        Route::get('/create', 'create')->name('create');
        Route::post('/{dish}/store', 'store')->name('store');
        Route::get('/{dish}/edit', 'edit')->name('edit');
        Route::put('/{dish}/update', 'update')->name('update');
        Route::delete('/{dish}/destroy', 'destroy')->name('destroy');
    });
Route::get('dishes/{dish}', action: [DishController::class, 'show'])->name('dishes.show');

Route::controller(RecipeController::class)
    ->prefix('recipes')
    ->name('recipes.')
    ->middleware('auth')
    ->group(function () {
        Route::get('/{recipe}/edit', 'edit')->name('edit');
        Route::post('/{recipe}/store', 'store')->name('store');
        Route::put('/{recipe}/update', 'update')->name('update');
        Route::delete('/{recipe}/destroy', 'destroy')->name('destroy');
    });
Route::controller(RecipeController::class)
    ->prefix('recipes')
    ->name('recipes.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::get('{recipe}', 'show')->name('show');
        Route::get('/popular', 'popularRecipes')->name('popular');
    });

Route::controller(InstrumentController::class)
    ->name('instruments.')
    ->prefix('instruments')
    ->middleware('auth')
    ->group(function () {
        Route::get('create', 'create')->name('create');
        Route::post('/{instrument}/store', 'store')->name('store');
        Route::get('/{instrument}/edit', 'edit')->name('edit');
        Route::put('/{instrument}/update', 'update')->name('update');
        Route::delete('/{instrument}/destroy', 'destroy')->name('destroy');
    });
Route::controller(InstrumentController::class)
    ->prefix('instruments')
    ->name('instruments.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('{instrument}', 'show')->name('show');
    });

Route::controller(PictureController::class)
    ->prefix('picture')
    ->name('picture.')
    ->middleware(['auth'])
    ->group(function () {
        Route::post('save', 'store')->name('store');
        // Route::put('{picture}/update', 'update')->name('update'); not transfer files
        Route::post('{picture}/update', 'update')->name('update');
        Route::get('{picture}/destroy', 'destroy')->name('destroy');
    });

Route::controller(LikeController::class)
    ->prefix('api/favorites')
    ->name('api.picture.')
    ->middleware(['auth'])
    ->group(function () {
        Route::post('{recipe}/action', 'reactToRecipe')->name('reactToRecipe');
        Route::post('{recipe}/status', 'isReactedByUser')->name('isReactedByUser');
        Route::post('{recipe}/count', 'likeCount')->name('likeCount');
    });

require __DIR__.'/auth.php';
