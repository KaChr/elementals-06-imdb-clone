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
    return view('splash');
});

Route::get('/movie-api', function () {
    
    return view('movie-api');
});

Route::get('/omdb', function () {
        
    return view('omdb');
});
Route::get('/testing', function () {
    
return view('testing');
});

Route::get('/components', function () {

    return view('components');
});

Route::get('/profilepage', function () {
    return view('profile-page');   
});

Route::get('/movies', function () {
    return view('movies');   
});
           
// Route::get('/home', function () {
//     return view('home');
// });
Route::get('/item', function () {
    return view('item-page');   
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('movies', 'MoviesController');
Route::resource('people', 'PeopleController');
Route::resource('genres', 'GenresController');

Route::get('tvshows', 'TvshowsController@index');

