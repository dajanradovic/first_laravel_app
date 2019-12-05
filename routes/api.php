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

Route::get('/posts', 'PostsApiController@index');
Route::get('/posts/{id}', 'PostsApiController@show');
Route::post('/posts', 'PostsApiController@store');
Route::put('/posts/{post}', 'PostsApiController@update');
Route::delete('/posts/{post}', 'PostsApiController@destroy');
Route::get('/posts/image/{id}', 'PostsApiController@getPostImage');
Route::post('/posts/comment', 'PostsApiController@insertComment');
Route::post('/posts/image/{post}', 'PostsApiController@uploadPostImage');






