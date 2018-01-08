<nav class="navbar is-dark">
  <div class="navbar-brand">
    <a class="navbar-item" href="{{ route('home') }}">
      <img src="{{ asset('images/emdb_logo_full@2x.png')}}" alt="Bulma: a modern CSS framework based on Flexbox" width="112" height="28">
    </a>
    <div class="navbar-burger burger" data-target="navbarExampleTransparentExample">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>

  <div id="navbarExampleTransparentExample" class="navbar-menu is-dark">
        <div class="navbar-start">
        <a class="navbar-item" href="#">
            Home
        </a>
        <a class="navbar-item" href="#">
            Top 250
        </a>
        <a class="navbar-item" href="#">
            Categories
        </a>
        <a class="navbar-item" href="#">
            My Watchlist
        </a>
        </div>
        <div class="navbar-end">
        <div class="navbar-item">
            <div class="field is-grouped">
            <p class="control">
                <a class="button button--small button--solid-blue">Log In</a>
            </p>
            <p class="control">
                <a class="button button--small button--solid-turquoise">Sign up</a>
            </p>
            </div>
        </div>
        </div>
  </div>
</nav>