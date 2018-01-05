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
Route::get('/tvshowz', function () {
    
return view('tvshowz');
});

Route::get('/components', function () {

    return view('components');
    
});

Route::get('/profilepage', function () {
    return view('profile-page');   
});
           
<<<<<<< e8c39433eedb022db9a9f9242375146988194ef3
// Route::get('/home', function () {
//     return view('home');
// });
=======
Route::get('/home', function () {
    return view('home');
});
>>>>>>> Remove old header from welcome.blade. Add routes to splash

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('movies', 'MoviesController');
Route::resource('people', 'PeopleController');
Route::resource('genres', 'GenresController');

Route::get('tvshows', 'TvshowsController@index');

