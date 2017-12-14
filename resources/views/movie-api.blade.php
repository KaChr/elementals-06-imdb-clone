<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.themoviedb.org/3/movie/tt2322441?api_key=ec3cda1b6d80802d7b2222e300f2f846",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_POSTFIELDS => "{}",
));

$response = curl_exec($curl);
$err = curl_error($curl);

//curl_close($curl);   

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  $arr = json_decode($response);
//   print_r($arr);
//echo $arr->title;
//echo "<br>";
//echo "<img src=http://image.tmdb.org/t/p/w185" . $arr->poster_path . ">";
echo "<br>";
$id = $arr->id;
echo $id;
echo "<br>";
//foreach($arr->backdrops as $img){
  echo "<img src=http://image.tmdb.org/t/p/w650" . $arr->backdrop_path . ">";

//}

 // foreach($arr->results as $result){
    //echo $result->title."<br>";
    //echo "<img src=http://image.tmdb.org/t/p/w185" . $result->poster_path . ">" . "<br>";
    //$value = $result->id;
    //echo $value;
  //}
}

// a href eller något.

// en ny request för Details.
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.themoviedb.org/3/movie/$id?language=en-US&api_key=cdc32d79384ddc6326eff808e85db1c7",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_POSTFIELDS => "{}",
));

$response = curl_exec($curl);
$err = curl_error($curl);



//curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
 // echo $value;
  $arr = json_decode($response);  
  foreach($arr->genres as $genre){

      //echo "$genre->name,";
      foreach($genre as $gen){
        echo $gen;
        echo ",";
      }
      echo "<br>";
  }
}


    //echo $result->title."<br>";
    //echo $result->title."<br>";
  //}
//}

// EXAKT SAMMA SOM OVAN MEN URL:

//CURLOPT_URL => "https://api.themoviedb.org/3/movie/  $result.id (eller var du döpt den till)   /credits?api_key=cdc32d79384ddc6326eff808e85db1c7",
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.themoviedb.org/3/movie/$id/credits?api_key=cdc32d79384ddc6326eff808e85db1c7",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_POSTFIELDS => "{}",
));

$response = curl_exec($curl);
$err = curl_error($curl);

//curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
 // echo $value;
  $arr = json_decode($response);  
  foreach($arr->cast as $casts){

      echo $casts->name;
      echo ", ";
  }
}