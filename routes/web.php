<?php

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


Route::get('home', 'HomeController@index')->name('home');

// ----------------- Vue routes (start) -----------------
// how to do it more safe???

Route::get('recipes/recipe-filter', 'RecipeFilter@getData');

Route::get('recipes/recipe-sorting', 'RecipeFilter@getData');

Route::resource('/download', 'DownloadingController')->only(['store', 'update', 'destroy']);

// ----------------- Vue routes (end) -----------------

Route::resource('posts', 'PostController');

Route::resource('users', 'UserController');

Route::resource('ingredients', 'IngredientController');

Route::resource('dishs', 'DishController');

Route::redirect('/', 'home');

// always in the end of list or Auth will break after page refresh
Auth::routes();
