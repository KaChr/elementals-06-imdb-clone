@extends('layouts.app')

@section('content')
    @include('includes.hero')
    @include('includes.takeover')
    <div class="container">
        <section class="section">
            @include('includes.reviews')
        </section>
    </div>
@endsection
