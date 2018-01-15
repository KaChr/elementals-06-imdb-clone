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
            <a class="navbar-item" href="/movies">
                Top 100
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
                    @guest
                        <p class="control">
                            <a href="{{ route('login') }}" class="button button--small button--solid-blue">Log In</a>
                        </p>
                        <p class="control">
                            <a href="{{ route('register') }}" class="button button--small button--solid-turquoise">Sign up</a>
                        </p>
                    @else
                        <p class="control">
                            {{ Auth::user()->name }}
                        </p>
                        <p class="control">
                            <a href="{{ route('logout') }}" 
                            class="button button--small button--solid-blue" 
                            onclick="event.preventDefault(); 
                            document.getElementById('logout-form').submit();">
                            Log out
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                        </p>
                    @endguest
                </div>
            </div>
        </div>
  </div>
</nav>