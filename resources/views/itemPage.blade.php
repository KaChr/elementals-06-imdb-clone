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
    <section class="item-info">
        <a class="button is-outlined">
            <span class="icon">
                <i class="fa fa-plus" area-hidden="true"></i>
            </span>
            <span>WATCHLIST</span>
        </a>
        <a class="button is-outlined">TRAILER</a>
    </section>
    <section class="plot">
        <figure class="image is-96x96">
            <img src="https://bulma.io/images/placeholders/96x96.png">
        </figure>
        <h2>PLOT SUMMARY</h2>
        <p>Text</p>
        <a class="button is-outlined">READ MORE</a>
    </section>
    <section class="cast-crew">
        <h2>CAST & CREW</h3>
        <a href="#">WIEW ALL</a>
        <hr>
        <figure class="image is-64x64">
            <img src="https://bulma.io/images/placeholders/64x64.png">
        </figure>
        <h3>Actor name</h3>
        <p>as Role</p>
    </section>
</body>
<footer>
    
</footer>
</html>