<a href="/movies/{{ $featured[0]->item_id }}">
  <section class="hero is-light featured" style="background-image: url(http://image.tmdb.org/t/p/w1920{{$featured[0]->movieBackdrop}})">
    <div class="hero-body is-flex">
        <div class="featured__content--bottom is-flex">
          <div class="featured__info">
            <span class="featured__info-genre">
            @foreach($item[0]->genres as $genre)
              {{ $loop->first ? '' : ', '}}
              {{$genre->genre_title}}
            @endforeach
            </span>
            <h1 class="featured__info-title">{{ $featured[0]->title }}</h1>
          </div>
          <div class="featured__rating is-flex">
            <span>{{ $featured[0]->rating }}</span>
          </div>
        </div>
    </div>
  </section>
</a>