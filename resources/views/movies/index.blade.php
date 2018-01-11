<html lang="{{ app()->getLocale() }}">
    @include('includes.head')
    <body>
        @include('includes/navigation')
        <h3 class="charts-titles">IMDb Charts</h3>
        <h3 class="charts-titles">Top Rated Movies</h3>
        <div class="dropdown">
            <div class="dropdown-trigger">
                <button class="button" aria-haspopup="true" aria-controls="dropdown-menu">
                <span>Dropdown button</span>
                <span class="icon is-small">
                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                </span>
                </button>
            </div>
            <div class="dropdown-menu" id="dropdown-menu" role="menu">
                <div class="dropdown-content">
                <a href="#" class="dropdown-item">
                    Dropdown item
                </a>
                <a class="dropdown-item">
                    Other dropdown item
                </a>
                <a href="#" class="dropdown-item is-active">
                    Active dropdown item
                </a>
                <a href="#" class="dropdown-item">
                    Other dropdown item
                </a>
                <hr class="dropdown-divider">
                <a href="#" class="dropdown-item">
                    With a divider
                </a>
                </div>
            </div>
        </div>
        <hr>
        <div class="grid--chart">
            @foreach($movies->slice(0, 20) as $movie) 
                <div> 
                    <img class="posters" src="{{$movie->poster}}"><br> 
                    <h5><a href="/movies/{{$movie->item_id}}">{{$movie->title}}</a></h5>
                    <img class="stars" src="{{ asset('images/star.png') }}" height="22px" width="21px">
                    <b>{{$movie->rating}}</b> 
                </div> 
            @endforeach 

        </div>
        @include('includes/footer')
    </body>
</html>