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
                <h1 class="featured__info-title">{{ $movie->title }}</h1>
                </div>
                <div class="featured__rating is-flex">
                <span>Rating: {{ $review->rating }}</span>
                </div>
            </div>
        </div>
    </section>
    <div class="container">      
        <section class="section">
            <div class="columns is-centered">
                <div class="column is-narrow">
                    <img src="{{ $movie->poster}}" alt="">
                </div>
                <div class="column is-6-desktop">
                    <h2>{{ $review->title }}</h2>
                    <p>{{ $review->body }}</p>
                </div>
            </div>
        </section>
        <section class="section">
            @include('includes.divider', ['title' => 'COMMENTS'])
            <div class="comments">
                @if(isset($comments))
                @foreach($comments as $comment)
                    <div class="comment">
                        <p>
                            {{ $comment->body }}
                        </p>
                    </div>
                @endforeach
                @endif
                {!! Form::open(['route'=>['movies.reviews.comments.store', $movie, $review]]) !!}
                    @include('reviews.comment', ['submitText' => 'Add comment'])
                {!! Form::close() !!}
            </div>
        </section>
    </div>

@endsection
