<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.themoviedb.org/3/movie/popular?page=1&language=en-US&api_key=cdc32d79384ddc6326eff808e85db1c7",
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

curl_close($curl);     // DENNA MÅSTE DU TA BORT OM DU SKA GÖRA EN NY REQUEST

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  $arr = json_decode($response);
//   print_r($arr);
  foreach($arr->results as $result){
    echo $result->title."<br>";
    echo "<img src=http://image.tmdb.org/t/p/w185" . $result->poster_path . ">" . "<br>";
  }
}

// a href eller något.
    //value = $result-id

// en ny request för Details.
/*
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.themoviedb.org/3/movie/    value = $result-id    ?language=en-US&api_key=cdc32d79384ddc6326eff808e85db1c7",
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



curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}


    //echo $result->title."<br>";
    //echo $result->title."<br>";
  }
}

// EXAKT SAMMA SOM OVAN MEN URL:

CURLOPT_URL => "https://api.themoviedb.org/3/movie/  $result.id (eller var du döpt den till)   /credits?api_key=cdc32d79384ddc6326eff808e85db1c7",
