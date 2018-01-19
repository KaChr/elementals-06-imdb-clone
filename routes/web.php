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


Route::get('/', 'HomeController@splash')->name('splash');

Route::get('/movie-api', function () {
    
    return view('movie-api');
});

Route::get('/omdb', function () {
        
    return view('omdb');
});

Route::get('/tvshowz', function () {
    
return view('tvshowz');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('users', 'UsersController');
Route::resource('movies', 'MoviesController');
Route::resource('people', 'PeopleController');
Route::resource('genres', 'GenresController');
Route::resource('tvshows', 'TvshowsController');
Route::resource('movies.reviews', 'ReviewsController');
Route::resource('movies.reviews.comments', 'CommentsController');

