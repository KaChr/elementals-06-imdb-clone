<?php

// Backpack\CRUD: Define the resources for the entities you want to CRUD.
CRUD::resource('movie', 'MovieCrudController');

CRUD::resource('tvshow', 'TvShowCrudController');

CRUD::resource('user', 'UserCrudController');

CRUD::resource('item', 'ItemCrudController');

CRUD::resource('review', 'ReviewCrudController');

CRUD::resource('genre', 'GenreCrudController');

CRUD::resource('comment', 'CommentCrudController');

CRUD::resource('season', 'SeasonCrudController');

CRUD::resource('episode', 'EpisodeCrudController');

Route::get('protected', ['middleware' => ['auth', 'admin'], function() {
    return "this page requires that you be logged in and an Admin";
}]);

