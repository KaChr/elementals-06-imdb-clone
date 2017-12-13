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
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>

  <div id="navbarExampleTransparentExample" class="navbar-menu">

        <a class="navbar-item-user">
          <img src="https://bulma.io/images/bulma-logo.png" alt="User" width="112" height="28">
        </a>


        <hr class="navbar-divider">

        <a class="navbar-item" href="#">
          <span class="icon">
            <i class="fa fa-home"></i>
          </span>
            Home
        </a>
        <a class="navbar-link" href="#">
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