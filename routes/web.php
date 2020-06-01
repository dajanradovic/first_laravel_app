<?php

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
    if(Auth::guest()){
        return View::make('greeting');
    }
    return redirect ('/home');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/posts/create', 'PostsController@create');
Route::post('/posts', 'PostsController@store');
Route::get('/posts', 'PostsController@index');
Route::get('/posts/{id}/edit', 'PostsController@edit');
Route::put('posts/{id}', 'PostsController@update');
Route::get('/posts/{id}', 'PostsController@show');

Route::delete('/posts/{id}', 'PostsController@destroy');

Route::post('/comments/create', 'CommentsController@store');


