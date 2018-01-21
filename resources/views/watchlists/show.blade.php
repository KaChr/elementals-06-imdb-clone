@extends('layouts.app')

@section('content')

<style>
.watchlist, .watchlist__info {
    text-align: center;
}

.watchlist__title {
    color: #6EADFF;
}


.watchlist__poster, .watchlist__title, .watchlist__delete--button {
    display: flex;
    align-items: center;
    justify-content: center;
    margin: auto;
}


.watchlist__poster, .watchlist__info {
    margin-top: 1rem;
}

.watchlist__title {
    text-align: center;
    margin-left: 0.5rem;
    margin-right: 0.5rem;
}

.watchlist__summary {
    margin: 2rem;
    margin-top: 1rem;
}


</style>


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

        <h5> {{ $watchlist->movies->implode('release_date', ',') }} 
          
         {{ $watchlist->movies->implode('runtime', ',') }} 
         {{ $watchlist->movies->implode('rating', ',') }}</h5>
        <p> {{ $watchlist->movies->implode('summary', ',') }} </p>
        
    </div>
        
         
        
     
    

@endforeach



@endsection
