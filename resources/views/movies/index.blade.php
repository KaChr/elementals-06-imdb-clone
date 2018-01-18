@extends('layouts.app')
@section('content')
        <h3 class="charts__titles">IMDb Charts</h3>
        <h3 class="charts__titles">Top Rated Movies</h3>
        <h5 class="charts__titles">Top 100 as rated by IMDb Users</h5>
        <hr>
        <div id="chart-buttons">
            <h6>Sort By</h6>
            <a class="small-button-green">Name</a>
            <a class="small-button-green">Rating</a>
            <a class="small-button-green">Release Date</a>
            <a class="small-button-green">Genre</a>
        </div>
        <div class="select">
        <select>
        @foreach($genres as $genre)
            <option value="{{ $genre->id }}">{{ $genre->genre_title }}</option>
        @endforeach
        </select>
        </div>
            @foreach($movies->slice(0, 100) as $movie)
                    <div class="grid-chart">
                        <div class="charts--poster">
                            <a href="/movies/{{$movie->item_id}}"><img class="posters" src="{{$movie->poster}}"></a>
                            <!-- Display the categories of the movie/s. Commented for now until a solution of why it doesn't load is found. -->
                            {{--
                            @foreach($item->genres as $genre)
                                {{$loop->first ? '' : ', '}}
                                {{$genre->genre_title}}
                            @endforeach --}}
                        </div>
                        <div class="charts--title">
                            <h5><a href="/movies/{{$movie->item_id}}">{{$movie->title}}</a></h5>
                        </div>
                        <div class="charts--rating">
                            <i class="fa fa-star"></i>
                            <span class="charts__rating">{{$movie->rating}}</span>
                        </div>
                    </div>
            @endforeach 
@endsection