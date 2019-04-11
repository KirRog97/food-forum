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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// how to do it more safe??? Midl??? Token of app??
Route::get('/recipes/recipe-filter', 'RecipeFilter@getData');

Route::get('/recipes/recipe-sorting', 'RecipeFilter@getData');

Route::resource('posts', 'PostController');

Route::resource('users', 'UserController');

Route::resource('ingredients', 'IngredientController');
