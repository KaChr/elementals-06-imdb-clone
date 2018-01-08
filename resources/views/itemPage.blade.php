<!DOCTYPE html>
<html lang="sv">
<head>
    @include('includes.head')
</head>
<body>
    @include('includes.headertemp')
        <section class="hero featured item" style="background-image: url('https://image.tmdb.org/t/p/original/mFb0ygcue4ITixDkdr7wm1Tdarx.jpg')">
  <div class="hero-body is-flex">
      <div class="featured__content--bottom is-flex">
        <div class="featured__info">
            @include('includes.rating')       
          <p class="year">2014</p>
          <h1 class="featured__info-title">JOHN WICK</h1>
          <ul class="button--ul">
              <li>
                  <button class="button button--small button--border-blue" type="button">
                    <span class="icon">
                        <i class="fa fa-plus" area-hidden="true"></i>
                    </span>
                    WATCHLIST
                  </button>
              </li>
              <li><button class="button button--small button--border-blue" type="button">TRAILER</button></li>
          </ul>
          <span class="featured__info-genre">ACTION, THRILLER</span>
        </div>
      </div>
  </div> 
</section>
    <section id="plot">
        <div class="container">
            <img class="poster-img" src="http://www.impawards.com/2014/posters/john_wick_xlg.jpg" alt="Movie poster">
        <article class="plot-text">
            <h4>PLOT SUMMARY</h4>
            <p>Ex-hitman John Wick comes out of retirement to track down the gangsters that took everything from him.</p>
            <!-- <a class="button is-outlined">READ MORE</a> -->
            <button class="button button--small button--read-more" type="button">READ MORE</button>
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