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
    <p>{{$movie->rating}}</p>
    <p>{{$movie->summary}}</p>
    <h2>Actors</h2>
    @foreach($movie->actors as $actor)
    <p>{{$actor->name}}</p>
    @endforeach
    <h2>Directors</h2>
    @foreach($movie->directors as $director)
    <p>{{$director->name}}</p>
    @endforeach 
</body>
</html>