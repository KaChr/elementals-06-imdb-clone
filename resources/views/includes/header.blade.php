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
    <div class="user-wrapper">
    <figure class="image is-48x48">
      <img src="https://bulma.io/images/placeholders/48x48.png">
    </figure>
    <p class="user-review">Izabel Rosén</p>
    <p class="user-review-written">0 reviews written</p>
    <figure class="image-logo image is-48x48">
      <img src="https://bulma.io/images/placeholders/48x48.png">
    </figure>
    </div>
      
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