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

Route::get('/item', function () {
    return view('item-page');   
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('movies', 'MoviesController');
Route::resource('people', 'PeopleController');
Route::resource('genres', 'GenresController');

Route::resource('tvshows', 'TvshowsController');
Route::resource('reviews', 'ReviewsController');

// Route::group(['prefix' => config('backpack.base.route_prefix', 'admin'), 'middleware' => ['admin'], 'namespace' => 'Admin'], function () {
//     Route::get('dashboard', '\Backpack\Base\app\Http\Controllers\MovieCrudController@dashboard');
// });
// Route::get('protected', ['middleware' => ['auth', 'admin'], function() {
//     // this page requires that you be logged in AND be an Admin
//     return view('/admin/dashboard');
// }]);

// get('protected', ['middleware' => ['auth'], function() {
//     // this page requires that you be logged inbut you don't need to be an admin
//     return view( ... );
// }]);
