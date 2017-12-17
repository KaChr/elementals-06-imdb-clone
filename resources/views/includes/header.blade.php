<!-- Navbar in header -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.1/css/bulma.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slideout/1.0.1/slideout.min.js"></script>
    <title>Document</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/app.js') }}"></script>

</head>
<body>

<nav class="navbar is-transparent">
  <div class="navbar-brand">
  <div class="navbar-start">
    <div class="navbar-burger burger" data-target="navMenu" onclick="toggleBurger()">
      <span class="span"></span>
      <span class="span"></span>
      <span class="span"></span>
    </div>
  </div>

  <div id="navbarExampleTransparentExample" class="navbar-menu">
  <figure class="image is-48x48">
  <img src="https://bulma.io/images/placeholders/48x48.png">
</figure>
<p class="user-review">Izabel Rosén</p>
<p class="user-review-written">0 reviews written</p>
<figure class="image-logo image is-48x48">
  <img src="https://bulma.io/images/placeholders/48x48.png">
</figure>



        <hr class="navbar-divider">

        <a class="navbar-item" href="#">
          <span class="icon">
            <i class="fa fa-home"></i>
          </span>
            Home
        </a>
        <a class="navbar-item" href="#">
        <span class="icon">
          <i class="fa fa-star"></i>
        </span>
        Top 250
        </a>
        <a class="navbar-item" href="#">
        <span class="icon">
          <i class="fa fa-trophy"></i>
        </span>
          Categories
        </a>
        <a class="navbar-item" href="#">
        <span class="icon">
          <i class="fa fa-television"></i>
        </span>
          My watchlist
        </a>
        <a class="navbar-item" href="#">
        <span class="icon">
          <i class="fa fa-power-off"></i>
        </span>
        Log out
        </a>

        <figure class="image-license image is-48x48">
  <img src="https://bulma.io/images/placeholders/48x48.png">
</figure>
  <p class="header-license"> © eMDB 2017 </p> 
  <p class="header-license emdb"> MIT License </p>

    </div>

  </div>
</nav>
<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>


<!-- If a dropdown is wanted from top 250 add this:
       <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link" href="#">
              Top 250
            </a>
          <div class="navbar-dropdown is-boxed">
            <a class="navbar-item" href="#">
              Movies
            </a>
            <a class="navbar-item" href="#">
              Series
            </a>
          </div>
        </div>  
-->

<!--
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Slideout Demo</title>
    <meta http-equiv="cleartype" content="on">
    <meta name="MobileOptimized" content="320">
    <meta name="HandheldFriendly" content="True">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slideout/1.0.1/slideout.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.1/css/bulma.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <style>
      body {
        width: 100%;
        height: 100%;
      }

      .slideout-menu {
        position: fixed;
        left: 0;
        top: 0;
        bottom: 0;
        right: 0;
        z-index: 0;
        width: 256px;
        overflow-y: scroll;
        -webkit-overflow-scrolling: touch;
        display: none;
      }

      .slideout-panel {
        position: relative;
        z-index: 1;
        will-change: transform;
      }

      .slideout-open,
      .slideout-open body,
      .slideout-open .slideout-panel {
        overflow: hidden;
      }

      .slideout-open .slideout-menu {
        display: block;
      }
    </style>
  </head>
  <body>

    <nav id="menu">
    <div id="navbarExampleTransparentExample" class="navbar-menu">
  <figure class="image is-48x48">
  <img src="https://bulma.io/images/placeholders/48x48.png">
</figure>
<p class="user-review">Izabel Rosén</p>
<p class="user-review-written">0 reviews written</p>



        <hr class="navbar-divider">

        <a class="navbar-item" href="#">
          <span class="icon">
            <i class="fa fa-home"></i>
          </span>
            Home
        </a>
        <a class="navbar-item" href="#">
        <span class="icon">
          <i class="fa fa-star"></i>
        </span>
        Top 250
        </a>
        <a class="navbar-item" href="#">
        <span class="icon">
          <i class="fa fa-trophy"></i>
        </span>
          Categories
        </a>
        <a class="navbar-item" href="#">
        <span class="icon">
          <i class="fa fa-television"></i>
        </span>
          My watchlist
        </a>
        <a class="navbar-item" href="#">
        <span class="icon">
          <i class="fa fa-power-off"></i>
        </span>
        Log out
        </a>

    </div>
    </nav>

    <main id="panel">
      <header>
        <button class="toggle-button">☰</button>
        
      </header>
    </main>

    <script src="dist/slideout.min.js"></script>
    <script>
      var slideout = new Slideout({
        'panel': document.getElementById('panel'),
        'menu': document.getElementById('menu'),
        'padding': 256,
        'tolerance': 70
      });

      // Toggle button
      document.querySelector('.toggle-button').addEventListener('click', function() {
        slideout.toggle();
      });
    </script>

  </body>
</html>
