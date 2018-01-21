@extends('layouts.app')

@section('content')


<h2 class="watchlist">Watchlist </h2>

@foreach ($watchlists as $watchlist)

   
   <div class="watchlist__wrapper"> 
        <a class="watchlist__id" href ="/movies/ {{$watchlist->movies->implode('item_id')}}">
            <img class="watchlist__poster" src="{{ $watchlist->movies->implode('poster', ',') }}">
                <h3 class="watchlist__title"> {{ $watchlist->movies->implode('title', ',') }} </h3>
        </a>

        <h5 class="watchlist__info"> {{ $watchlist->movies->implode('release_date', ',') }} | {{ $watchlist->movies->implode('runtime', ',') }} |
        {{ $watchlist->movies->implode('rating', ',') }} </h5>
        <p class="watchlist__summary"> {{ $watchlist->movies->implode('summary', ',') }} </p>

        <form method="post" action="/watchlist/delete">
            {{ csrf_field() }}

            <input type="hidden" name="id" value="{{$watchlist->movies->implode('item_id')}}">
                <input name="_method" type="hidden" value="DELETE">
                <button class="watchlist__delete--button button button--small button--border-turquoise" type="submit">DELETE</button>

        </form>

        <!-- <button class="watchlist__delete--button button button--small button--border-turquoise" type="submit">DELETE</button> -->



        <div class="divider">
            <div class="divider__info is-flex">
            </div>
            <span class="divider__line"></span>
        </div>
        

    </div>     

   <div class="watchlist"> 
        <a href ="/movies/ {{$watchlist->movies->implode('item_id')}}">
            <img src="{{ $watchlist->movies->implode('poster', ',') }}">
                <h3> {{ $watchlist->movies->implode('title', ',') }} </h3>
        </a>

        <h5 class="watchlist__release"> {{ $watchlist->movies->implode('release_date', ',') }} </h5>
        <h5 class="wathclist__runtime"> {{ $watchlist->movies->implode('runtime', ',') }} </h5>
        <h5 class="watchlist__rating"> {{ $watchlist->movies->implode('rating', ',') }} </h5>
        <p class="watchlist__summary"> {{ $watchlist->movies->implode('summary', ',') }} </p>

        <form method="post" action="/watchlist/delete">
            {{ csrf_field() }}

            <input type="hidden" name="id" value="{{$watchlist->movies->implode('item_id')}}">
                <input name="_method" type="hidden" value="DELETE">
                <button class="watchlist__delete--button button button--small button--border-turquoise" type="submit">DELETE</button>

        </form>

        <!-- <button class="watchlist__delete--button button button--small button--border-turquoise" type="submit">DELETE</button> -->



        <div class="divider">
            <div class="divider__info is-flex">
            </div>
            <span class="divider__line"></span>
        </div>
        

    </div>     

    

@endforeach



@endsection
