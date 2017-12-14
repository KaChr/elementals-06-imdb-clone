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
     
     curl_setopt_array($curl, array(
          CURLOPT_URL => "http://www.omdbapi.com/?t=john+wick&plot=full&apikey=63ae29b1",
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
      curl_close($curl);
     
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
       $genres = explode(", ", $obj->Genre);
       $moviegenre = "";
       foreach ($genres as $genre) {
          echo $moviegenre="<a class='genres' href='?genre=$genre'>$genre </a>";
       }
       echo "<br>";
       echo $obj->Director;
       echo "<br>";
       echo $obj->Actors;
       echo "<br>";
       echo $obj->imdbRating;
       echo "<br>";
       echo $obj->Language;
       /*foreach($obj as $titles){
        foreach($titles as $title) {
            /*echo $title['Title'];
            echo "<br>";
            echo $title['Year'];
            echo "<br>";
            echo $title['imdbID'];
            echo "<br>";
            echo $title['Type'];
            echo "<br>";
            echo "<img src='{$title['Poster']}'>";
            echo "<br>";
            echo "<br>";
            echo "<br>";*/

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
       // }
        //break;

    //}

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
?>
</body>
</html>