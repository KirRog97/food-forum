<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/recipe-filter', 'RecipeFilter@getData');
Route::post('/r/tags/cache', 'PostTagController@cache');

Route::get('/recipe-sorting', 'RecipeFilter@getData');

Route::post('/p/s', 'PictureController@store');
Route::put('/p/u/{id}', 'PictureController@update');
Route::delete('/p/d/{id}', 'PictureController@destroy');
