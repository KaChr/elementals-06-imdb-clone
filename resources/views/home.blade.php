@extends('layouts.app')

@section('content')
    @include('includes.hero')
    @include('includes.takeover')
    <div class="container">
        @include('includes.search')
        @include('includes.spotlight', ['title' => 'TOP RATED MOVIES', 'spotlights' => $spotlights['rated']])
        @include('includes.spotlight', ['title' => 'RECENTLY ADDED MOVIES', 'spotlights' => $spotlights['movies']])
        @include('includes.spotlight', ['title' => 'RECENTLY ADDED TV SHOWS', 'spotlights' => $spotlights['tvshows']])                        
        <section class="section">
            @include('includes.reviews')
        </section>
    </div>
@endsection
