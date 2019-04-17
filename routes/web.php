<?php

// use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// ----------------- Vue routes (start) -----------------
// how to do it more safe???

Route::get('/recipes/recipe-filter', 'RecipeFilter@getData');

Route::get('/recipes/recipe-sorting', 'RecipeFilter@getData');

// ----------------- Vue routes (end) -----------------

Route::resource('posts', 'PostController');

Route::resource('users', 'UserController');

Route::resource('ingredients', 'IngredientController');

Route::resource('dishs', 'DishController');

Route::get('/', function () {
    return redirect('home');
});
