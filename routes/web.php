<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DishController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PostController;
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
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('{user}', 'show')->name('show');
        Route::get('{user}/favorites', 'postsLikedByUser')->name('postsLikedByUser');
        Route::get('{user}/posts', 'postsCreatedByUser')->name('postsCreatedByUser');


        Route::middleware(['auth', 'own.user'])
            ->group(function () {
                Route::get('create', 'create')->name('create');
                Route::post('{user}/store', 'store')->name('store');
                Route::get('{user}/edit', 'edit')->name('edit');
                Route::put('{user}/update', 'update')->name('update');
                Route::delete('{user}/delete', 'destroy')->name('destroy');
            });
    });

// Route::resource('users', UserController::class);
// Route::resource('users', UserController::class)
//     ->except(
//         [
//             'index', 'show'
//         ]
//     )->middleware(['auth', 'own.user']);

// Route::get('/users/{user}/posts', [UserController::class, 'postsCreatedByUser']);
// Route::get('/users/{user}/favorites', [UserController::class, 'postsLikedByUser']);


Route::controller(IngredientController::class)
    ->prefix('ingredients')
    ->name('ingredients.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('{ingredient}', 'show')->name('show');
        Route::get('{ingredient}/usage', 'usage')->name('usage');


        Route::middleware(['auth'])
            ->group(function () {
                Route::get('create', 'create')->name('create');
                Route::post('{ingredient}/store', 'store')->name('store');
                Route::get('{ingredient}/edit', 'edit')->name('edit');
                Route::put('{ingredient}/update', 'update')->name('update');
                Route::delete('{ingredient}/destroy', 'destroy')->name('destroy');
            });
    });

// Route::resource('ingredients', IngredientController::class);
// Route::resource('ingredients', IngredientController::class)
//     ->except(
//         [
//             'index', 'show'
//         ]
//     )
//     ->middleware('auth');
// Route::get('ingredients/{ingredient}/usage', [IngredientController::class, 'usage']);

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

Route::controller(PostController::class)
    ->prefix('posts')
    ->name('posts.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('{post}', 'show')->name('show');
        Route::get('/popular', 'popularPosts')->name('popular');


        Route::middleware(['auth'])
            ->group(function () {
                Route::get('/create', 'create')->name('create');
                Route::post('{post}/store', 'store')->name('store');
                Route::get('{post}/edit', 'edit')->name('edit');
                Route::put('{post}/update', 'update')->name('update');
                Route::delete('{post}/destroy', 'destroy')->name('destroy');
            });
    });

Route::controller(InstrumentController::class)
    ->prefix('instruments')
    ->name('instruments.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('{instrument}', 'show')->name('show');

        Route::middleware(['auth'])
            ->group(function () {
                Route::get('create', 'create')->name('create');
                Route::post('{instrument}/store', 'store')->name('store');
                Route::get('{instrument}/edit', 'edit')->name('edit');
                Route::put('{instrument}/update', 'update')->name('update');
                Route::delete('{instrument}/destroy', 'destroy')->name('destroy');
            });
    });

Route::controller(PictureController::class)
    ->prefix('picture')
    ->name('picture.')
    ->middleware(['auth'])
    ->group(function () {
        Route::get('save', 'store')->name('store');
        Route::get('{picture}/update', 'update')->name('update');
        // Route::put('{picture}/update', 'update')->name('update'); not allowed files
        Route::get('{picture}/destroy', 'destroy')->name('destroy');
    });

// Route::group(
//     ['prefix' => 'picture', 'middleware' => ['auth']],
//     function () {
//         Route::post('save', [PictureController::class, 'store']);
//         Route::post('update/{picture}', [PictureController::class, 'update']);
//         // Route::put('update/{picture}', [PictureController::class, 'update']); not allowed files
//         Route::delete('delete/{picture}', [PictureController::class, 'destroy']);
//     }
// );

Route::controller(LikeController::class)
    ->prefix('api/favorites')
    ->name('api.picture.')
    ->middleware(['auth'])
    ->group(function () {
        Route::post('{post}/action', 'reactToPost')->name('reactToPost');
        Route::post('{post}/status', 'isReactedByUser')->name('isReactedByUser');
        Route::post('{post}/count', 'likeCount')->name('likeCount');
    });

// Route::group(
//     ['prefix' => 'api/favorites'],
//     function () {
//         Route::post('{post}/action', [LikeController::class, 'reactToPost'])
//             ->middleware('auth');
//         Route::post('{post}/status', [LikeController::class, 'isReactedByUser'])
//             ->middleware('auth');
//         Route::post('{post}/count', [LikeController::class, 'likeCount']);
//     }
// );

require __DIR__ . '/auth.php';
