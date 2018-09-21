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
Route::get('posts', 'ApiPostsController@index');

// list single post
Route::get('post/{id}', 'ApiPostsController@show');

// create new post
Route::post('post', 'ApiPostsController@store');

// update post
Route::put('post', 'ApiPostsController@store'); // use store again

// delete post
Route::delete('post/{id}', 'ApiPostsController@destroy');