<section class="section spotlight">
    @include('includes.divider')
    <div class="columns">
        @foreach($spotlights as $spotlight)
        <div class="column is-12-mobile spotlight__poster">
            <div class="spotlight__info">
                <h4>{{ $spotlight->title }}</h4>
            </div>
            <a href="/movies/{{ $spotlight->item_id }}">
                <img src="{{ $spotlight->poster }}" alt="{{ $spotlight->title }}">
            </a>
        </div>
        @endforeach
    </div>
</section>