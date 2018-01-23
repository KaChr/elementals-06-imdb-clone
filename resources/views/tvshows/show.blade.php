@extends('layouts.app')
@section('content')

<div class="item">
    <section class="hero featured" style="background-image: url('{{$tvshow->tvBackdrop}}')">
        <div class="hero-body is-flex">
            <div class="featured__content--bottom is-flex">
                <div class="featured__info">
                    @include('includes.rating', ['rating' => $tvshow->rating])       
                    <p class="featured__info-year">2014</p>
                    <p class="featured__info-runtime">{{$tvshow->runtime}}</p>
                    <h1 class="featured__info-title">{{$tvshow->title}}</h1>
                    <ul class="featured__info__actions">
                        <li>
                            <form method="POST" action="/watchlist">
                            {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{ $tvshow->item_id }}">
                                    <button class="button button--small button--border-blue" type="submit">
                                        <span class="icon">
                                            <i class="fa fa-plus" area-hidden="true"></i>
                                        </span>
                                        WATCHLIST
                                    </button>
                            </form>
                        </li>
                        <li>
                            <a href="#">
                                <button class="button button--small button--border-blue" type="button">TRAILER</button>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('tvshows.reviews.create', $tvshow)}}">
                                <button class="button button--small button--border-blue" type="button">WRITE REVIEW</button>
                            </a>
                        </li>
                    </ul>
                    <span class="featured__info-genre">
                        @foreach($item[0]->genres as $genre)
                            {{ $loop->first ? '' : ', '}}
                            {{$genre->genre_title}}
                        @endforeach
                    </span>
                </div>
            </div>
        </div> 
    </section>
    <section class="plot">
        <div class="container">
            <img class="plot__poster-img" src="{{$tvshow->poster}}" alt="Movie poster">
            <article class="plot__text">
                <h4>PLOT SUMMARY</h4>
                <p>{{$tvshow->summary}}</p>
                <button class="button button--small button--outline-blue" type="button">READ MORE</button>
            </article>
        </div>
    </section>
    <section class="section seasons">
        <div class="container">
            @include('tvshows.seasons', ['title' => $item ])
        </div>
    </section>
    <section class="cast-crew">
        <div class="container">
            @include('includes.person', [
                'actors' => $item[0]->actors, 
                'directors' => $item[0]->directors
            ])
        </div>
    </section>
    <section class="section reviews">
        <div class="container">
            @include('includes.reviews', ['reviews' => $reviews, 'poster' => $tvshow->poster])
        </div>
    </section>
</div>
@endsection
