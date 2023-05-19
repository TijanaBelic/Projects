<?php

use Illuminate\Support\Facades\Route;


//Route::view('/','index');
//Route::view('/movie','show');


//Route::get('/', 'App\Http\Controllers\PagesController@index')->name('index');

//Route::get('/movie', 'App\Http\Controllers\MovieController@index')->name('movies');


Route::get('/', 'App\Http\Controllers\MoviesController@index')->name('movies.index');
Route::get('/movies/{id}', 'App\Http\Controllers\MoviesController@show')->name('movies.show');

Route::get('/tv', 'App\Http\Controllers\TvController@index')->name('tv.index');
Route::get('/tv/{id}', 'App\Http\Controllers\TvController@show')->name('tv.show');

Route::get('/actors', 'App\Http\Controllers\ActorsController@index')->name('actors.index');
Route::get('/actors/page/{page?}', 'App\Http\Controllers\ActorsController@index');
Route::get('/actors/{id}', 'App\Http\Controllers\ActorsController@show')->name('actors.show');


Route::resource('posts', App\Http\Controllers\PostsController::class); 


//Route::get('/', function () {
  //  return view('welcome');
//});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
