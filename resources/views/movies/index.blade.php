@extends('layouts.app')
@section('content')
        <h3 class="charts__titles">IMDb Charts</h3>
        <h3 class="charts__titles">Top Rated Movies</h3>
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
                        <div class="charts__poster">
                            <a href="/movies/{{$movie->item_id}}"><img src="{{$movie->poster}}"></a>
                        </div>
                        <div class="charts__title">
                            <li><h6><a href="/movies/{{$movie->item_id}}">{{$movie->title}}</a></h6>
                            ({{ date('Y', strtotime($movie->release_date))}})</li>
                        </div>
                        <div class="charts__rating">
                            <i class="fa fa-star"></i>
                            <span>{{$movie->rating}}</span>
                        </div>
                    </div>
            @endforeach
            </ol>

@endsection