<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title> 
</head>
<body>

    <h1>{{$movie->title}}</h1>
    <img src="{{$movie->poster}}">
    <img src="{{$movie->movieBackdrop}}">
    <p>{{$movie->rating}}</p>
    <p>{{$movie->summary}}</p>
    <p>{{$movie->runtime}}</p>
    <p>{{$movie->countries}}</p>
    <h2>Genres</h2>
    <p>
    @foreach($item->genres as $genre)
        {{ $loop->first ? '' : ', '}}
        {{$genre->genre_title}}
    @endforeach
    </p>
    <h2>Actors</h2>
    @foreach($item->characters as $character)
       @foreach($character->actor as $actor)
            <h1>{{$character->character}}</h1>
       @endforeach
    @endforeach
    @foreach($item->actors as $actor)
    <p>{{$actor->name}}</p>
    <img src="{{$actor->profile_pic}}">
    @endforeach
    <h2>Directors</h2>
    @foreach($item->directors as $director)
    <p>{{$director->name}}</p>
    <img src="{{$director->profile_pic}}">
    @endforeach 
    <!--@foreach($reviews as $review)
    <p>{{$review->body}}</p>
    @endforeach-->
</body>
</html>