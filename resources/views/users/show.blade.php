@extends('layouts.app')

@section('content')
    <section class="user" style="background-image: url('{{ $backdrop[0]->movieBackdrop}}')">
        <div class="user__info">
            <figure class="image is-96x96 user__avatar">
                <img src="{{ $user->avatar }}">
            </figure> 
            
            <h4 class="user__name"> {{ $user->name }} </h4>
            <p class="user__email">{{ $user->email }}</p>
            <a href="#" class="user__edit"> Edit <i class="fa fa-cog" aria-hidden="true"></i></a>
        </div>
    </section>
    <!-- User list: Reviews -->
    <div class="container">
            @include('includes.spotlight', ['title' => 'WATCHLIST', 'spotlights' => $spotlight])
        <section class="section">
            @include('includes.reviews')
        </section>
    </div>
@endsection