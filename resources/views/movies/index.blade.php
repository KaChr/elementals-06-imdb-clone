<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    body{
        column-count: 5;
    }
    div{
        width: 300px;
        margin: 0px;
    }
    a{
        font-size: 26px;
        display: inline-block;
        width: 300px;
    }
    img{
        width: 180px
    }
    </style>
</head>
<body>
    @foreach($movies as $movie)
    <div>
    <a href="/movies/{{$movie->id}}">{{$movie->title}}</a>
    <img src='{{$movie->poster}}'><br>
    <!--<strong>{{$movie->runtime}}</strong><br> 
    <strong>{{$movie->rating}}</strong><br>
    <strong>{{$movie->countries}}</strong>-->
    </div>
    @endforeach
</body>
</html>