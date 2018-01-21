@extends('layouts.app')
@section('content')

@include('includes.search')

@foreach ($results as $key => $result)
<div class="container">
    @includeWhen(!$result->isEmpty(), 'includes.spotlight', [
        'title' => 'SEARCH RESULTS FOR “' . $query . '” IN ' . strtoupper($key), 
        'spotlights' => $results[$key],
        'type' => $key
    ])
    
    @includeWhen($results, 'includes.spotlight', [
        'title' => 'NO RESULTS FOUND FOR “' . $query . '”', 
        'spotlights' => [],
        'type' => $key
    ])

</div>
@endforeach

@endsection