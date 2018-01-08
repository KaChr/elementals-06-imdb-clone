<a href="/movies/{{ $featured->item_id }}">
  <section class="hero is-light featured" style="background-image: url(http://image.tmdb.org/t/p/w1920{{$featured->movieBackdrop}})">
    <div class="hero-body is-flex">
        <div class="featured__content--bottom is-flex">
          <div class="featured__info">
            <span class="featured__info-genre">
            @foreach($item->genres as $genre)
              {{ $loop->first ? '' : ', '}}
              {{$genre->genre_title}}
            @endforeach
            </span>
            <h1 class="featured__info-title">{{ $featured->title }}</h1>
          </div>
          <div class="featured__rating is-flex">
            <span>{{ $featured->rating }}</span>
          </div>
        </div>
    </div>
  </section>
</a>