@extends('layouts.app')
@section('content')
        <h3 class="charts__titles">IMDb Charts</h3>
        <h3 class="charts__titles">Top Rated Movies</h3>
        <h5 class="charts__titles">Top 100 as rated by IMDb Users</h5>
        <hr>
        <div id="chart-buttons">
            <h6>Sort By</h6>
            <span>@sortablelink('title')</span>
            <span>@sortablelink('rating')</span>
            <span>@sortablelink('release_date', 'Release Date')</span>

        </div>
            <ol>
            @foreach($movies->slice(0, 100) as $movie)
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