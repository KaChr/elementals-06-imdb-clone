<!DOCTYPE html>
<html lang="sv">
<head>
    @include('includes.head')
</head>
<body>
    <!-- <section class="item-info">
        <p>År</p>
        <h1>FILM TITEL</h1>
        <p>GENRE</p>
        <a class="button is-outlined">
            <span class="icon">
                <i class="fa fa-plus" area-hidden="true"></i>
            </span>
            <span>WATCHLIST</span>
        </a>
        <a class="button is-outlined">TRAILER</a>
    </section> -->
    <section id="plot">
        <div class="container">
            <img class="poster-img" src="http://www.impawards.com/2014/posters/john_wick_xlg.jpg" alt="Movie poster">
        <article class="plot-text">
            <h4>PLOT SUMMARY</h4>
            <p>Ex-hitman John Wick comes out of retirement to track down the gangsters that took everything from him.</p>
            <!-- <a class="button is-outlined">READ MORE</a> -->
        </article>
        </div>
    </section>
    <section class="cast-crew">
        <div class="container">
            @include('includes.person')
        </div>
    </section>
    <section class="review">
        <div class="container">
            @include('includes.reviews')
        </div>
    </section>
    <footer>
        @include('includes.footer')
    </footer>
</body>
</html>