<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\TvshowRequest as StoreRequest;
use App\Http\Requests\TvshowRequest as UpdateRequest;
use DB;

class TvshowCrudController extends CrudController
{
    public function setup()
    {

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Tvshow');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/tvshow');
        $this->crud->setEntityNameStrings('tvshow', 'tvshows');

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */

        $this->crud->setFromDb();

        // ------ CRUD FIELDS
        // $this->crud->addField($options, 'update/create/both');
        // $this->crud->addFields($array_of_arrays, 'update/create/both');
        // $this->crud->removeField('name', 'update/create/both');
        // $this->crud->removeFields($array_of_names, 'update/create/both');

        // ------ CRUD COLUMNS
        // $this->crud->addColumn(); // add a single column, at the end of the stack
        // $this->crud->addColumns(); // add multiple columns, at the end of the stack
        // $this->crud->removeColumn('column_name'); // remove a column from the stack
        // $this->crud->removeColumns(['column_name_1', 'column_name_2']); // remove an array of columns from the stack
        // $this->crud->setColumnDetails('column_name', ['attribute' => 'value']); // adjusts the properties of the passed in column (by name)
        // $this->crud->setColumnsDetails(['column_1', 'column_2'], ['attribute' => 'value']);

        // ------ CRUD BUTTONS
        // possible positions: 'beginning' and 'end'; defaults to 'beginning' for the 'line' stack, 'end' for the others;
        // $this->crud->addButton($stack, $name, $type, $content, $position); // add a button; possible types are: view, model_function
        // $this->crud->addButtonFromModelFunction($stack, $name, $model_function_name, $position); // add a button whose HTML is returned by a method in the CRUD model
        // $this->crud->addButtonFromView($stack, $name, $view, $position); // add a button whose HTML is in a view placed at resources\views\vendor\backpack\crud\buttons
        // $this->crud->removeButton($name);
        // $this->crud->removeButtonFromStack($name, $stack);
        // $this->crud->removeAllButtons();
        // $this->crud->removeAllButtonsFromStack('line');

        // ------ CRUD ACCESS
        // $this->crud->allowAccess(['list', 'create', 'update', 'reorder', 'delete']);
        // $this->crud->denyAccess(['list', 'create', 'update', 'reorder', 'delete']);

        // ------ CRUD REORDER
        // $this->crud->enableReorder('label_name', MAX_TREE_LEVEL);
        // NOTE: you also need to do allow access to the right users: $this->crud->allowAccess('reorder');

        // ------ CRUD DETAILS ROW
        // $this->crud->enableDetailsRow();
        // NOTE: you also need to do allow access to the right users: $this->crud->allowAccess('details_row');
        // NOTE: you also need to do overwrite the showDetailsRow($id) method in your EntityCrudController to show whatever you'd like in the details row OR overwrite the views/backpack/crud/details_row.blade.php

        // ------ REVISIONS
        // You also need to use \Venturecraft\Revisionable\RevisionableTrait;
        // Please check out: https://laravel-backpack.readme.io/docs/crud#revisions
        // $this->crud->allowAccess('revisions');

        // ------ AJAX TABLE VIEW
        // Please note the drawbacks of this though:
        // - 1-n and n-n columns are not searchable
        // - date and datetime columns won't be sortable anymore
        // $this->crud->enableAjaxTable();

        // ------ DATATABLE EXPORT BUTTONS
        // Show export to PDF, CSV, XLS and Print buttons on the table view.
        // Does not work well with AJAX datatables.
        // $this->crud->enableExportButtons();

        // ------ ADVANCED QUERIES
        // $this->crud->addClause('active');
        // $this->crud->addClause('type', 'car');
        // $this->crud->addClause('where', 'name', '==', 'car');
        // $this->crud->addClause('whereName', 'car');
        // $this->crud->addClause('whereHas', 'posts', function($query) {
        //     $query->activePosts();
        // });
        // $this->crud->addClause('withoutGlobalScopes');
        // $this->crud->addClause('withoutGlobalScope', VisibleScope::class);
        // $this->crud->with(); // eager load relationships
        // $this->crud->orderBy();
        // $this->crud->groupBy();
        // $this->crud->limit();
    }

    public function store(StoreRequest $request)
    {

        // your additional operations before save here
        // $redirect_location = parent::storeCrud($request);

        $curl = curl_init();

        $omdbApiKey = env('OMDB_API_KEY');
        $tmdbApiKey = env('TMDB_API_KEY');

        // array of tvshows
        $parsedTitle = str_replace(" ", "+", $request->title);

        $tvshows = [
            $parsedTitle
        ];
        
        foreach ($tvshows as $tvshow) {
            //request to API using cURL¨
            curl_setopt_array($curl, array(
                CURLOPT_URL => "http://www.omdbapi.com/?t=$tvshow&plot=full&apikey=$omdbApiKey&type=series",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_TIMEOUT => 6000000,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json',
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            if ($err) {
                echo "cURL Error #:" . $err;
            } else {
                $obj = json_decode($response);

                $imdbID = $obj->imdbID;
                //new request to new API themoviedb using the imdbID that we got from OMDB to get the backdrop for our tvshows
                    curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://api.themoviedb.org/3/find/$imdbID?api_key=$tmdbApiKey&language=en-US&external_source=imdb_id",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_TIMEOUT => 6000000,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_HTTPHEADER => array(
                        'Content-Type: application/json',
                    ),
                ));

                $response = curl_exec($curl);
                $err = curl_error($curl);

                if ($err) {
                    echo "cURL Error #:" . $err;
                } else {
                    $tvdata = json_decode($response);
                    foreach ($tvdata->tv_results as $data) {
                        $tvid = $data->id;
                        $tvBackdrop = $data->backdrop_path;
                    }
                    curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://api.themoviedb.org/3/tv/$tvid/credits?api_key=$tmdbApiKey&language=en-US",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_TIMEOUT => 6000000,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_HTTPHEADER => array(
                        'Content-Type: application/json',
                    ),
                ));
                    $response = curl_exec($curl);
                    $err = curl_error($curl);

                    if ($err) {
                        echo "cURL Error #:" . $err;
                    } else {
                        $tv_credits = json_decode($response);
                        curl_setopt_array($curl, array(
                            CURLOPT_URL => "https://api.themoviedb.org/3/tv/$tvid?api_key=$tmdbApiKey",
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_ENCODING => "",
                            CURLOPT_TIMEOUT => 6000000,
                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            CURLOPT_CUSTOMREQUEST => "GET",
                            CURLOPT_HTTPHEADER => array(
                                'Content-Type: application/json',
                            ),
                        ));

                        $response = curl_exec($curl);
                        $err = curl_error($curl);

                        if ($err) {
                            echo "cURL Error #:" . $err;
                        } else {
                            $tvdetails = json_decode($response);
                            $backdrop_url = "http://image.tmdb.org/t/p/w1280";

                            $query = DB::table('tvshows')->select('title')->where('title', '=', $obj->Title)->get();

                            DB::table('items')->insert([
                                'type' => 'tvshow'
                            ]);
                            $query_tvshow = DB::table('items')->select('id')->latest('id')->get();
                            DB::table('tvshows')->insert([
                                'item_id' => $query_tvshow[0]->id,
                                'title' => $obj->Title,
                                'seasons' => $tvdetails->number_of_seasons,
                                'summary' => $obj->Plot,
                                'year' => $tvdetails->first_air_date,
                                'runtime' => $obj->Runtime,
                                'countries' => $obj->Country,
                                'poster' => $obj->Poster,
                                'rating' => $obj->imdbRating,
                                'tvBackdrop' => $backdrop_url . $tvBackdrop,
                                'created_at' => date('Y-m-d H:i:s'),
                                'updated_at' =>  date('Y-m-d H:i:s')
                            ]);

                            foreach ($tvdetails->seasons as $season) {
                                $season_nr = $season->season_number;
                                if ($season_nr == 0) {
                                    continue;
                                }

                                DB::table('items')->insert([
                                    'type' => 'season'
                                ]);

                                $query_season = DB::table('items')->select('id')->latest('id')->get();
                                $query = DB::table('seasons')->insert([
                                    'item_id' => $query_season[0]->id,
                                    'tvshow_id' => $query_tvshow[0]->id,
                                    'season_nr' => $season_nr,
                                    'created_at' => date('Y-m-d H:i:s'),
                                    'updated_at' =>  date('Y-m-d H:i:s')
                                ]);

                                curl_setopt_array($curl, array(
                                    CURLOPT_URL => "https://api.themoviedb.org/3/tv/$tvid/season/$season_nr?api_key=$tmdbApiKey",
                                    CURLOPT_RETURNTRANSFER => true,
                                    CURLOPT_ENCODING => "",
                                    CURLOPT_TIMEOUT => 6000000,
                                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                    CURLOPT_CUSTOMREQUEST => "GET",
                                    CURLOPT_HTTPHEADER => array(
                                        'Content-Type: application/json',
                                    ),
                                ));
                                $response = curl_exec($curl);
                                $err = curl_error($curl);

                                if ($err) {
                                    echo "cURL Error #:" . $err;
                                } else {
                                    $seasons = json_decode($response);
                                    foreach ($seasons->episodes as $episode) {
                                        $episode_nr = $episode->episode_number;
                                        DB::table('items')->insert([
                                            'type' => 'episode',
                                            'created_at' => date('Y-m-d H:i:s'),
                                            'updated_at' =>  date('Y-m-d H:i:s')
                                        ]);

                                        $query_episode = DB::table('items')->select('id')->latest('id')->get();
                                        $query = DB::table('episodes')->insert([
                                            'item_id' => $query_episode[0]->id,
                                            'season_id' => $query_season[0]->id,
                                            'episode_nr' => $episode_nr,
                                            'title' => $episode->name,
                                            'summary' => $episode->overview,
                                            'rating' => $episode->vote_average,
                                            'airdate' => $episode->air_date,
                                            'backdrop' => $backdrop_url . $episode->still_path,
                                            'created_at' => date('Y-m-d H:i:s'),
                                            'updated_at' =>  date('Y-m-d H:i:s')
                                        ]);
                                    }
                                }
                            }
                        }
                        $genres = explode(", ", $obj->Genre);
                        foreach ($genres as $genre) {
                            //inserting the genre titles we got into the table genres
                            $query = DB::table('genres')->select('genre_title')->where('genre_title', '=', $genre)->get();
                            if (!isset($query[0])) {
                                DB::table('genres')->insert([
                                    'genre_title' => $genre,
                                    'created_at' => date('Y-m-d H:i:s'),
                                    'updated_at' =>  date('Y-m-d H:i:s')
                                ]);
                            }
                            //here we are making the connection with pivot table, so it connects the movie and the genres
                            $query = DB::table('genres')->select('id')->where('genre_title', '=', $genre)->get();

                            if (isset($query[0])) {
                                $queryPivot = DB::table('genre_item')
                                    ->select('item_id')
                                    ->where('item_id', '=', $query_tvshow[0]->id)
                                    ->where('genre_id', '=', $query[0]->id)
                                    ->get();
                            }

                            if (!isset($queryPivot[0])) {
                                DB::table('genre_item')->insert([
                                    'item_id' => $query_tvshow[0]->id,
                                    'genre_id' => $query[0]->id,
                                    'created_at' => date('Y-m-d H:i:s'),
                                    'updated_at' =>  date('Y-m-d H:i:s')
                                ]);
                            }
                        }

                        $profile_url = "http://image.tmdb.org/t/p/w185";

                        $cast_i = 0;
                        foreach ($tv_credits->cast as $index => $actors) {
                            $cast_i ++;
                            if ($cast_i >= 7) {
                                break;
                            }
                            $actor = $actors->name;
                            $character = $actors->character;
                            //inserting actor content into people table, storing name, date of birth and city
                            $query = DB::table('people')
                                    ->select('name')
                                    ->where('name', '=', $actor)
                                    ->get();

                            if (!isset($query[0])) {
                                $prof_pic = $tv_credits->cast[$index]->profile_path;

                                DB::table('people')->insert([
                                    'name' => $actor,
                                    'dob' => date('Y-m-d'),
                                    'city' => 'random',
                                    'profile_pic' => $profile_url . $prof_pic,
                                    'created_at' => date('Y-m-d H:i:s'),
                                    'updated_at' =>  date('Y-m-d H:i:s')
                                ]);
                            }

                            $query_character = DB::table('characters')
                                               ->select('character')
                                               ->where('character', '=', $character)
                                               ->get();

                            DB::table('characters')->insert([
                                'character' => $character,
                                'created_at' => date('Y-m-d H:i:s'),
                                'updated_at' =>  date('Y-m-d H:i:s')
                            ]);

                            $query_character = DB::table('characters')->select('id')->latest('id')->get();

                            //inserting item id and person id(actor) in our pivot table
                            $query = DB::table('people')->select('id')->where('name', '=', $actor)->get();
                            if (isset($query[0])) {
                                $queryPivot = DB::table('actor_character_item')
                                              ->select('person_id')
                                              ->where('item_id', '=', $query_tvshow[0]->id)
                                              ->where('person_id', '=', $query[0]->id)
                                              ->where('character_id', '=', $query[0]->id)
                                              ->get();
                            }
                            if (!isset($queryPivot[0])) {
                                DB::table('actor_character_item')->insert([
                                    'item_id' => $query_tvshow[0]->id,
                                    'person_id' => $query[0]->id,
                                    'character_id' => $query_character[0]->id,
                                    'created_at' => date('Y-m-d H:i:s'),
                                    'updated_at' =>  date('Y-m-d H:i:s')
                                ]);
                            }
                        }

                        $cast_i = 0;
                        foreach ($tv_credits->crew as $index => $director) {
                            $cast_i ++;
                            if ($cast_i >= 3) {
                                break;
                            }
                            $director = $director->name;
                            /*inserting content of people in database. name, date of birth, city(maybe will regret from getting
                             cause of lack of info in APIs)*/
                            $query = DB::table('people')
                                    ->select('name')
                                    ->where('name', '=', $director)
                                    ->get();

                            //if we have the data in table rows then it will not store it anymore(no duplicates)
                            if (!isset($query[0])) {
                                $director_pic = $tv_credits->crew[$index]->profile_path;
                                DB::table('people')->insert([
                                    'name' => $director,
                                    'dob' => date('Y-m-d'),
                                    'city' => 'random',
                                    'profile_pic' => $profile_url . $director_pic,
                                    'created_at' => date('Y-m-d H:i:s'),
                                    'updated_at' =>  date('Y-m-d H:i:s')
                                ]);
                            }
                            //inserting the id of item and the id of person(in this case director) into Database
                            $query = DB::table('people')
                                    ->select('id')
                                    ->where('name', '=', $director)
                                    ->get();

                            if (isset($query[0])) {
                                $queryPivot = DB::table('director_item')
                                              ->select('person_id')
                                              ->where('item_id', '=', $query_tvshow[0]->id)
                                              ->where('person_id', '=', $query[0]->id)
                                              ->get();
                            }
                            //if we have the data in table rows then it will not store it anymore(no duplicates)
                            if (!isset($queryPivot[0])) {
                                DB::table('director_item')->insert([
                                    'item_id' => $query_tvshow[0]->id,
                                    'person_id' => $query[0]->id,
                                    'created_at' => date('Y-m-d H:i:s'),
                                    'updated_at' =>  date('Y-m-d H:i:s')
                                ]);
                            }
                        }
                    }
                }
            }
        }
        curl_close($curl);

        echo(PHP_EOL);
        echo '##############################';
        echo(PHP_EOL);
        echo 'tvshows added successfully!';
        echo(PHP_EOL);
        echo '##############################';
        echo(PHP_EOL);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return redirect('admin/tvshow');
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
