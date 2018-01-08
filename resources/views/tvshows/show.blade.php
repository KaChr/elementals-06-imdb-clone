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
    <img src="{{$tvshow->poster}}">
    <img src="{{$tvshow->tvBackdrop}}">;
    <p>{{$tvshow->rating}}</p>
    <p>{{$tvshow->summary}}</p>
    <p>{{$tvshow->runtime}}</p>
    <p>{{$tvshow->countries}}</p>
    <h2>Genres</h2>
    <p>
    @foreach($item->genres as $genre)
        {{ $loop->first ? '' : ', '}}
        {{$genre->genre_title}}
    @endforeach
    </p>
    <h2>Actors</h2>
    @foreach($item->actors as $actor)
    <p>{{$actor->name}}</p>
    <img src="{{$actor->profile_pic}}">;
    @endforeach
    <h2>Directors</h2>
    @foreach($item->directors as $director)
    <p>{{$director->name}}</p>
    @endforeach 
</body>
</html>