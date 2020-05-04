<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::resource('posts', 'PostController');
Route::resource('users', 'UserController');
Route::resource('ingredients', 'IngredientController');
Route::resource('dishes', 'DishController');


Route::get('/post-filter', 'PostFilter@getData');

Route::post('/p/s', 'PictureController@store');
Route::put('/p/u/{id}', 'PictureController@update');
Route::delete('/p/d/{id}', 'PictureController@destroy');

Route::post('/post/ing/save', 'IngredientPostController@saveInSession');
Route::post('/post/ing/store/', 'IngredientPostController@store');
Route::put('/post/ing/update/{id}', 'IngredientPostController@update');

Route::redirect('/', 'home');

// always in the end of list or Auth will break after page refresh
Auth::routes();
