@extends('layouts.app')
@section('content')


<div class="container">

    @if (count($movies) > 0)
        @include('includes.spotlight', ['title' => 'SEARCH RESULTS FOR: ' . $query, 'spotlights' => $movies])
    @else
        <p>No results found. Please try another search query.</p>
    @endif

</div>

@endsection