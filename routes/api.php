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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// list posts
//Route::get('posts', 'PostsController@index');
Route::get('posts', 'PostsApiController@index');

// list single post
Route::get('post/{id}', 'PostsApiController@show');

// create new post
Route::post('post', 'PostsApiController@store');

// update post
Route::put('post', 'PostsApiController@store'); // use store again

// delete post
Route::delete('post/{id}', 'PostsApiController@destroy');

// passport
//Route::get('passports', 'PostsPassportController');
Route::get('passports', 'PostsPassportController')->middleware('auth:api');
