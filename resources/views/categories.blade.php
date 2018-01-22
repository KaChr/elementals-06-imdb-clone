@extends('layouts.app')
@section('content')
        <h3 class="charts__titles">Movie Categories</h3>
        <hr>
        <form method="get" action="{{ action('MoviesController@genreSelect') }}">
            <div class="field">
                <div class="control">
                    <div class="select">
                        <select id="genreSelector" name="genre" onchange="submit(this);">
                            @foreach($genres as $genre)
                                @if( request()->get('genre') == $genre->id)
                                    <option selected="selected" value="{{ $genre->id }}">{{ $genre->genre_title }}</option>
                                @else
                                    <option value="{{ $genre->id }}">{{ $genre->genre_title }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </form>
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