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

Route::get('/', 'AlbumsController@index');
Route::resource('albums','AlbumsController');

Route::get('/photos/create/{id}', 'PhotosController@create');
Route::get('/photos/show/{id}', 'PhotosController@show');
Route::post('/photos/store', 'PhotosController@store');
Route::delete('/photos/{id}', 'PhotosController@destroy');