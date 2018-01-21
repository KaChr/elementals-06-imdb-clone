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
                <h1 class="featured__info-title">{{ $title->title }}</h1>
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
                    <img src="{{ $title->poster}}" alt="">
                </div>
                <div class="column is-6-desktop">
                    <h2>{{ $review->title }}</h2>
                    <p>{{ $review->body }}</p>
                </div>
            </div>
        </section>
        <section class="section">
            @include('includes.divider', ['title' => 'COMMENTS', 'link' => false])
            <div class="comments">
                @if(isset($comments))
                    @foreach($comments as $comment)
                        <div class="comment">
                            <a href="/users/{{ $comment->author_id }}">
                                <div class="review__avatar">
                                    <img src="{{ $comment->avatar }}" alt="">
                                </div>
                            </a>
                            <div class="comment__content">
                                <a href="/users/{{ $comment->author_id }}"><h5> {{ $comment->name }}</h5></a>
                                <p>
                                    {{ $comment->body }}
                                </p>
                                <p class="p__fig p__fig-small">
                                    {{ $comment->created_at }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                @endif
                @if(!Auth::guest() && get_class($title) == 'App\Movie')
                    {!! Form::open(['route'=>['movies.reviews.comments.store', $title, $review]]) !!}
                        @include('reviews.comment', ['submitText' => 'Add comment'])
                    {!! Form::close() !!}
                @elseif(!Auth::guest())
                    {!! Form::open(['route'=>['tvshows.reviews.comments.store', $title, $review]]) !!}
                        @include('reviews.comment', ['submitText' => 'Add comment'])
                    {!! Form::close() !!}
                @endif
            </div>
        </section>
    </div>

@endsection
