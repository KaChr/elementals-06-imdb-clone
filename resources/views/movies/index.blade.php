<html lang="{{ app()->getLocale() }}">
    @include('includes.head')
    <body>
        @include('includes.navigation')
        <h3 class="charts__titles">IMDb Charts</h3>
        <h3 class="charts__titles">Top Rated Movies</h3>
        <h5 class="charts__titles">Top 100 as rated by IMDb Users</h5>
        <hr>
        <div id="chart-buttons">
            <h6>Sort By</h6>
            <a class="large-button-green">Name</a>
            <a class="large-button-green">Rating</a>
            <a class="large-button-green">Release Date</a>
        </div>
            @foreach($movies->slice(0, 100) as $movie)
            <ol>
                <li>
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
                </li>
            </ol>
            @endforeach 
        @include('includes.footer')
    </body>
</html>