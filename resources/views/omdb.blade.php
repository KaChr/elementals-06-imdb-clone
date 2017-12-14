<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    .column {
    float: left;
    width: 25%;
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}
.genres{
    text-decoration: none;
    color: red;
}
    
    </style>
</head>
<body>
<?php
     $curl = curl_init();
     $movies = [
         'john+wick',
         'it',
         'harry+potter',
         'fifty+shades+of+grey'
     ];
     $i = 1;
     foreach($movies as $movie) {
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
        echo $obj->Title;
        echo "<br>";
        echo "<img src=$obj->Poster>";
        echo "<br>";
        echo $obj->Plot;
        echo "<br>";
        echo $obj->Year;
        echo "<br>";
        echo $obj->Released;
        echo "<br>";
        echo $obj->Runtime;
        echo "<br>";
        //getting the genres of the film, exploiting it and storing in databse
        $genres = explode(", ", $obj->Genre);
        $moviegenre = "";
        foreach ($genres as $genre) {
            echo $moviegenre="<a class='genres' href='?genre=$genre'>$genre </a>";
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
                'genre_id' => $query[0]->id]);
            }
        }
        echo "<br>";
        echo $obj->Director;
        echo "<br>";
        echo $obj->Actors;
        $actors = explode(", ", $obj->Actors);
        foreach($actors as $actor) {

            $query = DB::table('people')->select('name')->where('name', '=', $actor)->get();
            if(!isset($query[0])) {
                DB::table('people')->insert([
                    'name' => $actor,
                    'dob' => date('Y-m-d'),
                    'city' => 'random'
                ]);
            }

            $query = DB::table('people')->select('id')->where('name', '=', $actor)->get();
            if(!isset($query[0])){
            DB::table('actor_movie')->insert([
                    'movie_id' => $i,
                    'person_id' => $query[0]->id]);
            }
        }
        //storing the title of movie
        DB::table('movies')->insert(
            ['title'=>"{$obj->Title}"]);





        echo "<br>";
        echo $obj->imdbRating;
        echo "<br>";
        echo $obj->Language;
        
        
            /* DB::table('movies')->insert(
                    ['title'=>"{$title->title}",
                    'poster'=>"{$title['Poster']}",
                    'year'=>"{$title['Year']}",
                    'budget'=>"{$title->metadata->budget}",
                    'directors'=>"{$title->director}",
                    'rating'=>"{$title->rating}",
                    'genre'=>"{$genres}",
                    'storyline'=>"{$title->storyline}",
                    'stars'=>"{$stars}",
                    'trailer'=>"{$trailer->videoUrl}"
                    //'url'=>"{$url->url}"
                    ]);*/

        /*$moviez = DB::table('movies')->get();
        echo "<div class='row'>";
        foreach ($moviez as $movie ){
            echo "<div class='column'>";
            echo "<h1>$movie->title</h1>"; 
            echo "<img src='$movie->poster'>";
            echo "<p>$movie->year</p>";
            /*echo "<p>$movie->budget</p>";
            echo "<p>$movie->directors</p>";
            echo "<p>$movie->rating</p>";
            echo "<p>$movie->storyline</p>";
            echo "<p>$movie->stars</p>";*/
        /*
            echo "</div>";
        }
            echo "</div>";
        //dd($arr);
        /*foreach($arr as $ar){
            var_dump($ar['budget']);*/
        //   }
        }
        $i++;
    }
    
    curl_close($curl);
?>
</body>
</html>