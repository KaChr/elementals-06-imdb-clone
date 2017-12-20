<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bulma Link -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.1/css/bulma.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/itemPage.css') }}">
    <script defer src="https://use.fontawesome.com/releases/v5.0.1/js/all.js"></script>
    <title>Item page</title> 
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
            <h3>PLOT SUMMARY</h3>
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

    <footer>
    
    </footer>
</body>
</html>