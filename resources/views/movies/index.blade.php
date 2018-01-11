<html lang="{{ app()->getLocale() }}">
    @include('includes.head')
    <body>
        @include('includes/navigation')
        <h3 class="charts__titles">IMDb Charts</h3>
        <h3 class="charts__titles">Top Rated Movies</h3>
        <h5 class="charts__titles">Top 20 as rated by IMDb Users</h5>

        <hr>
        <div class="grid--chart">
            @foreach($movies as $movie) 
                <div> 
                    <a href="/movies/{{$movie->item_id}}"><img class="posters" src="{{$movie->poster}}"></a><br> 
                    <h5><a href="/movies/{{$movie->item_id}}">{{$movie->title}}</a></h5>
                    <img class="stars" src="{{ asset('images/star.png') }}" height="22px" width="21px">
                    <b>{{$movie->rating}}</b> 
                </div> 
            @endforeach 

        </div>
        @include('includes/footer')
    </body>
</html>