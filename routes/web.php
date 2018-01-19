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

Route::get('/', function () {

    return view('welcome');
});

Route::get('/tvshowz', function () {
    
return view('tvshowz');
});

Route::get('/components', function () {

    return view('components');
    
});

Route::get('/profilepage', function () {
    return view('profile-page');   
});
           
Route::get('/splash', function () {
    return view('splash');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('movies', 'MoviesController');
Route::resource('people', 'PeopleController');
Route::resource('genres', 'GenresController');

Route::resource('tvshows', 'TvshowsController');
Route::resource('reviews', 'ReviewsController');
Route::get('tvshows/{item_id}/seasons/{season_nr}', 'SeasonsController@show');
Route::get('tvshows/{item_id}/seasons/{season_nr}/episodes/{episode_nr}', 'EpisodesController@show');


