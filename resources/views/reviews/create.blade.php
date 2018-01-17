@extends('layouts.app')

@section('content')
    <section class="hero is-light featured" style="background-image: url({{$movie->movieBackdrop}})">
        <div class="hero-body is-flex">
            <div class="featured__content--bottom is-flex">
                <div class="featured__info">
                <span class="featured__info-genre">
                @foreach($item->genres as $genre)
                    {{ $loop->first ? '' : ', '}}
                    {{$genre->genre_title}}
                @endforeach
                </span>
                <h1 class="featured__info-title">Write a review for: {{ $movie->title }}</h1>
                </div>
                <div class="featured__rating is-flex">
                <span>Rating: </span>
                </div>
            </div>
        </div>
    </section>
    <div class="container">      
        <section class="section">
        </section>
    </div>
@endsection
