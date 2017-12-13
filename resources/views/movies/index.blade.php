<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    div{
        width: 400px;
        margin: 0px;
    }
    </style>
</head>
<body>
    @foreach($movies as $movie)
    <div>
    <a href="/movies/{{$movie->id}}"><h1>{{$movie->title}}</h1></a>
    <h3>{{$movie->summary}}</h3> 
    <strong>{{$movie->release_date}}</strong><br> 
    <strong>{{$movie->runtime}}</strong><br> 
    <strong>{{$movie->rating}}</strong><br>
    <img src="http://image.tmdb.org/t/p/w185{{$movie->poster}}"><br>
    <img src='{{$movie->poster}}'>
    </div>
    @endforeach
</body>
</html>