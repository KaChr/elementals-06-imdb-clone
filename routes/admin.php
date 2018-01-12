<?php

// Backpack\CRUD: Define the resources for the entities you want to CRUD.
CRUD::resource('movie', 'MovieCrudController');

CRUD::resource('tvshow', 'TvShowCrudController');

CRUD::resource('user', 'UserCrudController');