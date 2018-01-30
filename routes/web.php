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

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
  Route::name('create_post_path')->get('/posts/create', 'PostController@create');
  Route::name('posts_path')->post('/posts', 'PostController@index');
  Route::name('update_post_path')->put('/posts/{post}', 'PostController@update');
  Route::name('delete_post_path')->delete('/posts/{post}', 'PostController@delete');
  Route::name('edit_post_path')->get('/posts/edit/{post}', 'PostController@edit');


});
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'PostController@index');
Route::name('posts_path')->get('/posts', 'PostController@index');
Route::name('post_path')->get('/posts/{post}', 'PostController@show');
Route::name('store_post_path')->post('/posts', 'PostController@store');
