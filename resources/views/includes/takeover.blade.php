<section class="columns is-gapless">
  <div class="column hide-overflow">
      <section class="hero takeover" style="background-image: url('{{$featured[1]->movieBackdrop}}')">
        <div class="hero-body is-flex">
            <div class="takeover__content--bottom is-flex">
              <div class="takeover__info">
                <span class="takeover__info-genre">
                @foreach($item[1]->genres as $genre)
                    {{ $loop->first ? '' : ', '}}
                    {{$genre->genre_title}}
                  @endforeach
                  </span>
                <h1 class="takeover__info-title">{{ $featured[1]->title }}</h1>
              </div>
              <div class="takeover__cta is-flex">
                  <button class="button button--small button--border-turquoise">WATCH TRAILER</button>
              </div>
            </div>
        </div>
      </section>
  </div>
  <div class="column hide-overflow">
    <section class="hero takeover" style="background-image: url('{{$featured[2]->movieBackdrop}}')">
      <div class="hero-body is-flex">
          <div class="takeover__content--bottom is-flex">
            <div class="takeover__info">
              <span class="takeover__info-genre">
              @foreach($item[2]->genres as $genre)
                  {{ $loop->first ? '' : ', '}}
                  {{$genre->genre_title}}
                @endforeach
                </span>
              <h1 class="takeover__info-title">{{ $featured[2]->title }}</h1>
            </div>
            <div class="takeover__cta is-flex">
                <button class="button button--small button--border-turquoise">WATCH TRAILER</button>
            </div>
          </div>
      </div>
    </section>
  </div>
</section>