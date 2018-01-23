@extends('layouts.app')

@section('content')
    @if(get_class($title) == 'App\Movie')
        <section class="hero is-light featured" style="background-image: url({{$title->movieBackdrop}})">
    @else
        <section class="hero is-light featured" style="background-image: url({{$title->tvBackdrop}})">
    @endif 
        <div class="hero-body is-flex">
            <div class="featured__content--bottom is-flex">
                <div class="featured__info">
                <span class="featured__info-genre">
                @foreach($item->genres as $genre)
                    {{ $loop->first ? '' : ', '}}
                    {{$genre->genre_title}}
                @endforeach
                </span>
                <h1 class="featured__info-title">Write a review for: {{ $title->title }}</h1>
                </div>
            </div>
        </div>
    </section>
    <div class="container">      
        <section class="section">
            <div class="columns is-centered">
                <div class="column is-narrow">
                    <img src="{{ $title->poster}}" alt="">
                </div>
                <div class="column is-6-desktop">
                @if(get_class($title) == 'App\Movie')                
                    {!! Form::open(['route'=>['movies.reviews.store', $title]]) !!}
                        @include('reviews.form', ['submitText' => 'Post review'])
                    {!! Form::close() !!}
                @else
                    {!! Form::open(['route'=>['tvshows.reviews.store', $title]]) !!}
                        @include('reviews.form', ['submitText' => 'Post review'])
                    {!! Form::close() !!}
                @endif
                </div>
            </div>
        </section>
    </div>
@endsection
