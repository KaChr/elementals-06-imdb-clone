<?php
     $curl = curl_init();
     //array of movies
     $movies = [
         'john+wick',
         'it',
         'harry+potter',
         'fifty+shades+of+grey',
         'men+in+black'
     ];
     $i = 1;
     foreach($movies as $movie) {
         //request to API using cURL
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
            $query = DB::table('movies')->select('title')->where('title', '=', $obj->Title)->get();
            if(!isset($query[0])){
                DB::table('movies')->insert([
                    'title'=>$obj->Title,
                    'summary'=>$obj->Plot,
                    'release_date'=>date('Y-m-d', strtotime($obj->Released)),
                    'runtime'=>$obj->Runtime,
                    'rating'=>$obj->imdbRating,
                    'poster'=>$obj->Poster,
                    'countries'=>$obj->Country,
                    'imdbID'=>$obj->imdbID
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
                if(!isset($query[0])){
                    DB::table('genre_movie')->insert([
                        'movie_id' => $i,
                        'genre_id' => $query[0]->id
                        ]);
                }
            }
           
            $actors = explode(", ", $obj->Actors);
            foreach($actors as $actor) {
                //inserting actor content into people table, storing name, date of birth and city
                $query = DB::table('people')->select('name')->where('name', '=', $actor)->get();
                if(!isset($query[0])){
                    DB::table('people')->insert([
                        'name' => $actor,
                        'dob' => date('Y-m-d'),
                        'city' => 'random'
                        ]);

                }
                //inserting movie id and person id(actor) in our pivot table
                $query = DB::table('people')->select('id')->where('name', '=', $actor)->get();
                if(isset($query[0])){
                    $queryPivot = DB::table('actor_movie')->select('person_id')->where('movie_id', '=', $i)->
                    where('person_id', '=', $query[0]->id)->get();
                }
                if(!isset($queryPivot[0])){
                    DB::table('actor_movie')->insert([
                        'movie_id' => $i,
                        'person_id' => $query[0]->id
                        ]);

                }
            }

            $directors = explode(", ", $obj->Director);
            foreach($directors as $director){
                /*inserting content of people in database. name, date of birth, city(maybe will regret from getting
                the additional info about directors as dob and city, cause of lack of info in APIs)*/
                $query = DB::table('people')->select('name')->where('name', '=', $director)->get();
                //if we have the data in table rows then it will not store it anymore(no duplicates)
                if(!isset($query[0])){
                    DB::table('people')->insert([
                        'name' => $director,
                        'dob' => date('Y-m-d'),
                        'city' => 'random'
                        ]);

                }
                //inserting the id of movie and the id of person(in this case director) into Database
                $query = DB::table('people')->select('id')->where('name', '=', $director)->get();
                if(isset($query[0])) {
                    $queryPivot = DB::table('director_movie')->select('person_id')->where('movie_id', '=', $i)->
                    where('person_id', '=', $query[0]->id)->get();
                }
                //if we have the data in table rows then it will not store it anymore(no duplicates)
                if(!isset($queryPivot[0])){
                    DB::table('director_movie')->insert([
                        'movie_id' => $i,
                        'person_id' => $query[0]->id
                        ]);

                }
            }
            $i++;
        }
    }

    curl_close($curl);
