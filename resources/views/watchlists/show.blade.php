@extends('layouts.app')

@section('content')

<style>
h2 {
    text-align: center;
}
</style>


<h2>Watchlist </h2>

@foreach ($watchlists as $watchlist)

   
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