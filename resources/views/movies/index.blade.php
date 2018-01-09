<html lang="{{ app()->getLocale() }}">
    @include('includes.head')
    <body>
        @include('includes/navigation')
        <h3 id="top-250">Top 250 Movies Right Now</h3>
        <div class="grid--chart">
            @foreach($movies->slice(0, 20) as $movie) 
                <div> 
                    <img src="{{$movie->poster}}"><br> 
                    <a href="/movies/{{$movie->item_id}}">{{$movie->title}}</a> 
                    <p>Rating: {{$movie->rating}}</p> 
                </div> 
            @endforeach 

        </div>
        @include('includes/footer')
    </body>
</html>