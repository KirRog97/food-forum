<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\IngredientPostController;
use App\Http\Controllers\PictureController;
use App\Http\Controllers\LikeController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::redirect('/', '/home');

Route::get(
    '/home',
    function () {
        return Inertia::render('Home');
    }
)->name('home');

Route::resource('users', UserController::class);
Route::resource('users', UserController::class)
    ->except(
        [
            'index', 'show'
        ]
    )->middleware(['auth', 'own.user']);

Route::get('/users/{user}/posts', [UserController::class, 'postsCreatedByUser']);
Route::get('/users/{user}/favorites', [UserController::class, 'postsLikedByUser']);

Route::resource('ingredients', IngredientController::class);
Route::resource('ingredients', IngredientController::class)
    ->except(
        [
            'index', 'show'
        ]
    )
    ->middleware('auth');
Route::get('ingredients/{ingredient}/usage', [IngredientController::class, 'usage']);

Route::resource('dishes', DishController::class);

Route::resource('posts', PostController::class);
Route::resource('posts', PostController::class)
    ->except(
        [
            'index', 'show', 'popularPosts'
        ]
    )->middleware('auth');
Route::post('post/ing/save', [IngredientPostController::class, 'saveInSession'])
    ->middleware('auth');
Route::get('popular/posts', [PostController::class, 'popularPosts'])
    ->name('posts.popular');

Route::group(
    ['prefix' => 'picture', 'middleware' => ['auth']],
    function () {
        Route::post('save', [PictureController::class, 'store']);
        Route::post('update/{picture}', [PictureController::class, 'update']);
        // Route::put('update/{picture}', [PictureController::class, 'update']); not allowed files
        Route::delete('delete/{picture}', [PictureController::class, 'destroy']);
    }
);

Route::group(
    ['prefix' => 'api/favorites'],
    function () {
        Route::post('{post}/action', [LikeController::class, 'reactToPost'])
            ->middleware('auth');
        Route::post('{post}/status', [LikeController::class, 'isReactedByUser'])
            ->middleware('auth');
        Route::post('{post}/count', [LikeController::class, 'likeCount']);
    }
);

require __DIR__ . '/auth.php';
