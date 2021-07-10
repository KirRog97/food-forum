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

Route::resource('users', 'UserController');
Route::resource('users', 'UserController')->except([
    'index', 'show'
])->middleware(['auth', 'own.user']);

Route::get('/users/{user}/posts', 'UserController@postsCreatedByUser');
Route::get('/users/{user}/favorites', 'UserController@postsLikedByUser');

Route::resource('ingredients', 'IngredientController');
Route::resource('ingredients', 'IngredientController')->except([
    'index', 'show'
])->middleware('auth');
Route::get('ingredients/{ingredient}/usage', 'IngredientController@usage');

Route::resource('dishes', 'DishController');

Route::resource('posts', 'PostController');
Route::resource('posts', 'PostController')->except([
    'index', 'show', 'popularPosts'
])->middleware('auth');
Route::post('post/ing/save', 'IngredientPostController@saveInSession')->middleware('auth');
Route::get('popular/posts', 'PostController@popularPosts')->name('posts.popular');

Route::group(['prefix' => 'picture', 'middleware' => ['auth']], function () {
    Route::post('save', 'PictureController@store');
    Route::post('update/{picture}', 'PictureController@update');
    // Route::put('update/{picture}', 'PictureController@update'); not allowed files
    Route::delete('delete/{picture}', 'PictureController@destroy');
});

Route::group(['prefix' => 'api/favorites'], function () {
    Route::post('{post}/action', 'LikeController@reactToPost')->middleware('auth');
    Route::post('{post}/status', 'LikeController@isReactedByUser')->middleware('auth');
    Route::post('{post}/count', 'LikeController@likeCount');
});




Route::redirect('/', 'home');

// always in the end of list or Auth will break after page refresh
Auth::routes();
