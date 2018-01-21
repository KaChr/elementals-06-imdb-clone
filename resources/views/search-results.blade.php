@extends('layouts.app')
@section('content')

@include('includes.search')

    @foreach ($results as $key => $result)
    <div class="container">
        @includeWhen(!$result->isEmpty(), 'includes.results', [
            'title' => 'SEARCH RESULTS FOR “' . $query . '” IN ' . strtoupper($key), 
            'spotlights' => $results[$key],
            'type' => $key
        ])
        
        @includeWhen($results, 'includes.results', [
            'title' => 'NO RESULTS FOUND FOR “' . $query . '”', 
            'spotlights' => [],
            'type' => $key
        ])

    </div>
    @endforeach

@endsection