<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

use App\Movie;
use App\Item;

class TvshowsFromApi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:tvshows';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Connects to themoviedb API and fetches movies and feeds the data into your database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $curl = curl_init();

        $omdbApiKey = env('OMDB_API_KEY');
        $tmdbApiKey = env('TMDB_API_KEY');

        //array of tvshows
        $tvshows = [
            'game+of+thrones',
            'scorpion',
            'the+100',
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
    }
    //Echo success
}
