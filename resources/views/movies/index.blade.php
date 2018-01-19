@extends('layouts.app')
@section('content')
        <h3 class="charts__titles">IMDb Charts</h3>
        <h3 class="charts__titles">Top Rated Movies</h3>
        <hr>
        <div id="chart-buttons">
            <h6>Sort By</h6>
            <span>@sortablelink('title')</span>
            <span>@sortablelink('rating')</span>
            <span>@sortablelink('release_date')</span>

        <form method='post' action='/movies/genre'>
            {{ csrf_field() }}
            <div class="select">
                <select name='genre'>
                    @foreach($genres as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->genre_title }}</option>
                    @endforeach
                </select>
                <input type="submit" value="CHOOSE">
            </div>
        </form>
        </div>
            <ol>
            @foreach($movies as $movie)
                    <div class="grid-chart">
                        <div class="charts--poster">
                            <a href="/movies/{{$movie->item_id}}"><img class="posters" src="{{$movie->poster}}"></a>
                        </div>
                        <div class="charts--title">
                            <li><h6><a href="/movies/{{$movie->item_id}}">{{$movie->title}}</a></h6>
                            ({{ date('Y', strtotime($movie->release_date))}})</li>
                        </div>
                        <div class="charts--rating">
                            <i class="fa fa-star"></i>
                            <span class="charts__rating">{{$movie->rating}}</span>
                        </div>
                    </div>
            @endforeach
            </ol>

@endsection