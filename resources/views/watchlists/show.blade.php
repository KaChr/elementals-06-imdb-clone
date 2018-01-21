@extends('layouts.app')

@section('content')

<style>
.watchlist {
    text-align: center;
}



.watchlist__poster, .watchlist__title  {
    display: flex;
    align-items: center;
    justify-content: center;
    margin: auto;
}

.watchlist__poster {
    margin-top: 1rem;
}

.watchlist__title {
    text-align: center;
    margin-left: 0.5rem;
    margin-right: 0.5rem;
}

.watchlist__release, .wathclist__runtime, .watchlist__rating {
    display: flex;
    flex-wrap: nowrap;
    justify-content: center;
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

        <h5 class="watchlist__release"> {{ $watchlist->movies->implode('release_date', ',') }} </h5>
        <h5 class="wathclist__runtime"> {{ $watchlist->movies->implode('runtime', ',') }} </h5>
        <h5 class="watchlist__rating"> {{ $watchlist->movies->implode('rating', ',') }} </h5>
        <p class="watchlist__summary"> {{ $watchlist->movies->implode('summary', ',') }} </p>

    </div>     
    

@endforeach



@endsection