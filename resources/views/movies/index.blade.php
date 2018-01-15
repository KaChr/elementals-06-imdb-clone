<html lang="{{ app()->getLocale() }}">
    @include('includes.head')
    <body>
        @include('includes.navigation')
        <h3 class="charts__titles">IMDb Charts</h3>
        <h3 class="charts__titles">Top Rated Movies</h3>
        <h5 class="charts__titles">Top 20 as rated by IMDb Users</h5>

        <hr>
            @foreach($movies as $movie) 
                <div class="grid-chart">
                    <div class="charts--poster">
                        <a href="/movies/{{$movie->item_id}}"><img class="posters" src="{{$movie->poster}}"></a>
                    </div>
                    <div class="charts--title">
                        <h5><a href="/movies/{{$movie->item_id}}">{{$movie->title}}</a></h5>
                    </div>
                    <div class="charts--rating">
                        <i class="fa fa-star"></i>
                        <span class="charts__rating">{{$movie->rating}}</span>
                    </div>
                </div> 
            @endforeach 
        @include('includes.footer')
    </body>
</html>