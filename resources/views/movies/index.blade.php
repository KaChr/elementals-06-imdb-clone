<html lang="{{ app()->getLocale() }}">
    @include('includes.head')
    <body>
        @include('includes/navigation')
        <h3 id="top-250">Top 250 Movies Right Now</h3>
        <div class="grid-chart">
            @foreach($movies->slice(0, 20) as $movie) 
                <div> 
                    <img src='https://www.mehlizmovies.is/movies/olafs-frozen-adventure{{$movie->poster}}'><br> 
                    <a href="/movies/{{$movie->item_id}}">{{$movie->title}}</a> 
                    <p>Rating: {{$movie->rating}}</p> 
                </div> 
            @endforeach 
            <div>
                <img src="http://p-hold.com/200/300">
                <h4>Wide tile</h4>
            </div>
            <div>
                <img src="http://p-hold.com/200/300">
                <h4>Wide tile</h4>
            </div>
            <div>
                <img src="http://p-hold.com/200/300">
                <h4>Wide tile</h4>
            </div>
            <div>
                <img src="http://p-hold.com/200/300">
                <h4>Wide tile</h4>
            </div>
            <div>
                <img src="http://p-hold.com/200/300">
                <h4>Wide tile</h4>
            </div>
            <div>
                <img src="http://p-hold.com/200/300">
                <h4>Wide tile</h4>
            </div>
            <div>
                <img src="http://p-hold.com/200/300">
                <h4>Wide tile</h4>
            </div>
            <div>
                <img src="http://p-hold.com/200/300">
                <h4>Wide tile</h4>
            </div>
            <div>
                <img src="http://p-hold.com/200/300">
                <h4>Wide tile</h4>
            </div>
            <div>
                <img src="http://p-hold.com/200/300">
                <h4>Wide tile</h4>
            </div>
            <div>
                <img src="http://p-hold.com/200/300">
                <h4>Wide tile</h4>
            </div>
            <div>
                <img src="http://p-hold.com/200/300">
                <h4>Wide tile</h4>
            </div>
            <div>
                <img src="http://p-hold.com/200/300">
                <h4>Wide tile</h4>
            </div>
            <div>
                <img src="http://p-hold.com/200/300">
                <h4>Wide tile</h4>
            </div>
            <div>
                <img src="http://p-hold.com/200/300">
                <h4>Wide tile</h4>
            </div>
            <div>
                <img src="http://p-hold.com/200/300">
                <h4>Wide tile</h4>
            </div>
            

        </div>
        @include('includes/footer')
    </body>
</html>