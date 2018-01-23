@extends('layouts.app')
@section('content')

<div class="item">
    <section class="hero featured" style="background-image: url('{{$episodes[0]->backdrop}}')">
        <div class="hero-body is-flex">
            <div class="featured__content--bottom is-flex v-self-center">
                <div class="featured__info">       
                    <h1>{{ $tvshow->title }}</h1>
                    <h1 class="featured__info-title">Season {{$season->season_nr}}</h1>
                </div>
            </div>
        </div> 
    </section>
    <section class="section episodes">
        <div class="container">
            <ol>
            @foreach($episodes as $episode)
                    <div class="grid-chart">
                        <div class="charts__poster">
                        <a href='{{$season->season_nr}}/episodes/{{$episode->episode_nr}}'><img src="{{$episode->backdrop}}"></a>
                        </div>
                        <div class="charts__title">
                            <li>
                            <a href='{{$season->season_nr}}/episodes/{{$episode->episode_nr}}'><h6>{{$episode->title}}</h6></a>
                            </li>
                        </div>
                        <div class="charts__rating">
                            <i class="fa fa-star"></i>
                            <span>{{$episode->rating}}</span>
                        </div>
                    </div>
            @endforeach
            </ol>
        </div>
    </section>
</div>
@endsection
