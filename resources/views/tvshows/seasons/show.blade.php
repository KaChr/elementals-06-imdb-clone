<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>{{$tvshow->title}}</h1>
    <h2>Season - {{$season->season_nr}}</h2>
    @foreach($episodes as $episode)
        <a href='{{$season->season_nr}}/episodes/{{$episode->episode_nr}}'>{{$episode->episode_nr}} {{$episode->title}}</a><br>
    @endforeach
</body>
</html>