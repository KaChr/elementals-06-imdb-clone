<?php
//use GuzzleHttp\Exception\GuzzleException;
//use GuzzleHttp\Client;
     $curl = curl_init();
     //array of movies
     $tvshows = [
         'game+of+thrones',
         'vikings',
         'scorpion',
         'sherlock',
         'dark',
         'black+mirror',
         'the+arrow',
         'the+punisher',
         'suits',
         'the+flash',
         'the+100',
         'legion',
         'luke+cage'
         /*'harry+potter',
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
         'downfall'*/
     ];
     
     $i = 1;  
    foreach($tvshows as $tvshow) {
         //request to API using cURL¨
        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://www.omdbapi.com/?t=$tvshow&plot=full&apikey=8ea32694",
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
                CURLOPT_URL => "https://api.themoviedb.org/3/find/$imdbID?api_key=cdc32d79384ddc6326eff808e85db1c7&language=en-US&external_source=imdb_id",
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
                //dd($tvdata);
                foreach($tvdata->tv_results as $data){
                    //echo $tvBackdrop->backdrop_path;
                   $tvid = $data->id;
                   $tvBackdrop = $data->backdrop_path;
                } 
                //echo "<img src=http://image.tmdb.org/t/p/w650" . $movieBackdrop->backdrop_path . ">";
            
                curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://api.themoviedb.org/3/tv/$tvid/credits?api_key=cdc32d79384ddc6326eff808e85db1c7&language=en-US",
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
                    /*$cast_i = 0;
                    foreach($tv_credits->cast as $cast){
                        $cast_i ++;
                        if($cast_i >= 4){
                            break;
                        }
                    }*/
                    //dd($cast);
            $backdrop_url = "http://image.tmdb.org/t/p/w1280";
            //inserting content of people in database. name, date of birth, city(maybe will regret from getting
            $query = DB::table('tvshows')->select('title')->where('title', '=', $obj->Title)->get();
            if(!isset($query[0])){
                DB::table('items')->insert([
                    'type' => 'tvshow'
                ]);
                DB::table('tvshows')->insert([
                    'item_id' => $i,
                    'title' => $obj->Title,
                    //'seasons' => $obj->totalSeasons,
                    'summary' => $obj->Plot,
                    //'year' => $obj->Year,
                    'runtime' => $obj->Runtime,
                    'countries' => $obj->Country,
                    'poster' => $obj->Poster,
                    'rating' => $obj->imdbRating,
                    /*'episodes'=>$obj->,
                    'seasons'=
                    'release_date'=>date('Y-m-d', strtotime($obj->Released)),
                    'runtime'=>$obj->Runtime,
                    'rating'=>$obj->imdbRating,
                    'poster'=>$obj->Poster,
                    'countries'=>$obj->Country,
                    'imdbID'=>$obj->imdbID,*/
                    'tvBackdrop'=> $backdrop_url . $tvBackdrop
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
                
           //$actors = explode(", ", $obj->Actors);

           $profile_url = "http://image.tmdb.org/t/p/w185";

            $cast_i = 0;
            foreach($tv_credits->cast as $index => $actors) {
                $cast_i ++;
                    if($cast_i >= 7){
                        break;
                    }
                $actor = $actors->name;
                $character = $actors->character;
                //inserting actor content into people table, storing name, date of birth and city
                $query = DB::table('people')->select('name')->where('name', '=', $actor)->get();
                if(!isset($query[0])){
                    $prof_pic = $tv_credits->cast[$index]->profile_path;
                    //echo "<img src='http://image.tmdb.org/t/p/w185{$prof_pic}'>";
                    DB::table('people')->insert([
                        'name' => $actor,
                        'dob' => date('Y-m-d'),
                        'city' => 'random',
                        'profile_pic' => $profile_url . $prof_pic
                        ]);

                }
                $query_character = DB::table('characters')->select('character')->where('character', '=', $character)->get();
                    DB::table('characters')->insert([
                        'character' => $character
                    ]);
                $query_character = DB::table('characters')->select('id')->latest('id')->get();


                //inserting movie id and person id(actor) in our pivot table
                $query = DB::table('people')->select('id')->where('name', '=', $actor)->get();
                if(isset($query[0])){
                    $queryPivot = DB::table('actor_character_item')->select('person_id')->where('item_id', '=', $i)->
                    where('person_id', '=', $query[0]->id)->where('character_id', '=', $query[0]->id)->get();
                }
                if(!isset($queryPivot[0])){
                    DB::table('actor_character_item')->insert([
                        'item_id' => $i,
                        'person_id' => $query[0]->id,
                        'character_id' => $query_character[0]->id
                        ]);

                }
            }  

            $cast_i = 0;
                    foreach($tv_credits->crew as $index => $director){
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
                            $director_pic = $tv_credits->crew[$index]->profile_path;
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