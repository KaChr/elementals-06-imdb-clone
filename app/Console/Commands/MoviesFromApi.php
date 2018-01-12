<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\Movie;
use App\Item;

class MoviesFromApi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:movies';

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
             //array of movies
             $movies = [
                 'it',
                 'harry+potter',
                 'fifty+shades+of+grey',
                 'dunkirk',
                 'wonder+woman',
                 'blade+runner+2049',
                 'thor:+ragnarök',
                 'natural+born+pranksters',
                 'john+wick',
                 'john+wick:+chapter+2',
                 'watchmen',
                 'interstellar',
                 '2012',
                 'avatar',
                 'fifty+shades+darker',
                 'movie+43',
                 'the+lost+empire',
                 'the+girl+next+door',
                 'the+disaster+artist',
                 'the+room',
             ];

             $i = 1;  
            foreach($movies as $movie) {
                 //request to API using cURL¨
                curl_setopt_array($curl, array(
                    CURLOPT_URL => "http://www.omdbapi.com/?t=$movie&plot=full&apikey=8ea32694",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_TIMEOUT => 6000000,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_HTTPHEADER => array(
                        // Set Here Your Requesred Headers
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
                    //new request to new API themoviedb using the imdbID that we got from OMDB to get the backdrop for our movies
                    curl_setopt_array($curl, array(
                        CURLOPT_URL => "https://api.themoviedb.org/3/movie/$imdbID?api_key=cdc32d79384ddc6326eff808e85db1c7",
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
                        $movieBackdrop = json_decode($response);
        
                        curl_setopt_array($curl, array(
                        CURLOPT_URL => "https://api.themoviedb.org/3/movie/$imdbID/credits?api_key=ec3cda1b6d80802d7b2222e300f2f846",
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
                        $movie_credits = json_decode($response);
                        /*$cast_i = 0;
                        foreach($movie_credits->cast as $cast){

                            $cast_i ++;
                            if($cast_i >= 4){
                                break;
                            }
                            $actor_name = $cast->name;
                        }*/
                        $backdrop_url = "http://image.tmdb.org/t/p/w1280";
                    //inserting content of people in database. name, date of birth, city(maybe will regret from getting
                    $query = DB::table('movies')->select('title')->where('title', '=', $obj->Title)->get();
                    if(!isset($query[0])){
                        DB::table('items')->insert([
                            'type' => 'movie'
                        ]);
                        DB::table('movies')->insert([
                            'item_id' => $i,
                            'title'=>$obj->Title,
                            'summary'=>$obj->Plot,
                            'release_date'=>date('Y-m-d', strtotime($obj->Released)),
                            'runtime'=>$obj->Runtime,
                            'rating'=>$obj->imdbRating,
                            'poster'=>$obj->Poster,
                            'countries'=>$obj->Country,
                            'imdbID'=>$obj->imdbID,
                            'movieBackdrop'=>$backdrop_url . $movieBackdrop->backdrop_path
                            ]);
                        }
                    //getting the genres of the film, exploiting it and storing in databse
                    $genres = explode(", ", $obj->Genre);
                    //storing the content of movie into database
                    foreach ($genres as $genre) {
                        //just inserting the genre titles we got into the table genres
                        $query = DB::table('genres')->select('genre_title')->where('genre_title', '=', $genre)->get();
                        if(!isset($query[0])) {
                            DB::table('genres')->insert([
                                'genre_title' => $genre
                                ]);
        
                        }
                        //here we are making the connection with pivot table, so it connects the movie and the genres
                        $query = DB::table('genres')->select('id')->where('genre_title', '=', $genre)->get();
                        // print_r($query[0]->id);
                        if(isset($query[0])){
                            $queryPivot = DB::table('genre_item')->select('item_id')->where('item_id', '=', $i)->
                            where('genre_id', '=', $query[0]->id)->get();
                        }
        
                        if(!isset($queryPivot[0])){
                            DB::table('genre_item')->insert([
                                'item_id' => $i,
                                'genre_id' => $query[0]->id
                                ]);
                        }
                    }
                        
                   $profile_url = "http://image.tmdb.org/t/p/w185";
                   $cast_i = 0;
                    foreach($movie_credits->cast as $index => $actor) {
                        $cast_i ++;
                            if($cast_i >= 7){
                                break;
                            }
                        $actor = $actor->name;
                        //inserting actor content into people table, storing name, date of birth and city
                        $query = DB::table('people')->select('name')->where('name', '=', $actor)->get();
                        if(!isset($query[0])){
                            $prof_pic = $movie_credits->cast[$index]->profile_path;
                            //echo "<img src='http://image.tmdb.org/t/p/w185{$prof_pic}'>";
                            DB::table('people')->insert([
                                'name' => $actor,
                                'dob' => date('Y-m-d'),
                                'city' => 'random',
                                'profile_pic' => $profile_url . $prof_pic
                                ]);
        
                        }
                        //inserting movie id and person id(actor) in our pivot table
                        $query = DB::table('people')->select('id')->where('name', '=', $actor)->get();
                        if(isset($query[0])){
                            $queryPivot = DB::table('actor_character_item')->select('person_id')->where('item_id', '=', $i)->
                            where('person_id', '=', $query[0]->id)->get();
                        }
                        if(!isset($queryPivot[0])){
                            DB::table('actor_character_item')->insert([
                                'item_id' => $i,
                                'person_id' => $query[0]->id
                                ]);
        
                        }
                    } 
        
                    //$directors = explode(", ", $obj->Director);
                    $cast_i = 0;
                    foreach($movie_credits->crew as $index => $director){
                        $cast_i ++;
                            if($cast_i >= 2){
                                break;
                            }
                            $director = $director->name;
                        /*inserting content of people in database. name, date of birth, city(maybe will regret from getting
                         cause of lack of info in APIs)*/
                        $query = DB::table('people')->select('name')->where('name', '=', $director)->get();
                        //if we have the data in table rows then it will not store it anymore(no duplicates)
                        if(!isset($query[0])){
                            $director_pic = $movie_credits->crew[$index]->profile_path;
                            DB::table('people')->insert([
                                'name' => $director,
                                'dob' => date('Y-m-d'),
                                'city' => 'random',
                                'profile_pic' => $profile_url . $director_pic
                                ]);
        
                        }
                        //inserting the id of movie and the id of person(in this case director) into Database
                        $query = DB::table('people')->select('id')->where('name', '=', $director)->get();
                        if(isset($query[0])){
                            $queryPivot = DB::table('director_item')->select('person_id')->where('item_id', '=', $i)->
                            where('person_id', '=', $query[0]->id)->get();
                        }
                        //if we have the data in table rows then it will not store it anymore(no duplicates)
                        if(!isset($queryPivot[0])){
                            DB::table('director_item')->insert([
                                'item_id' => $i,
                                'person_id' => $query[0]->id
                                ]);
        
                        }
                    }
                    $i++;
                
                        }
                    }
                
                }
            }
            curl_close($curl);
            
 echo (PHP_EOL);
 echo '##############################';
 echo (PHP_EOL); 
 echo 'movies added successfully!';
 echo (PHP_EOL); 
 echo '##############################';
 echo (PHP_EOL);
}
 //Echo success
}
