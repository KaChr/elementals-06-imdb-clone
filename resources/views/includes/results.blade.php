<section class="section spotlight">
    @include('includes.divider')
    <div class="columns">
        @forelse($spotlights as $spotlight)
        <div class="column is-12-mobile spotlight__poster">
            <div class="spotlight__info">
                <h4>{{ $spotlight->title or $spotlight->name or $spotlight->genre_title}}</h4>
            </div>
            <a href="/{{$type}}/{{ $spotlight->id or $spotlight->item_id }}">
                <div class="spotlight__image">
                    <img src="{{ $spotlight->profile_pic or $spotlight->poster }}" alt="{{ $spotlight->name or $spotlight->title }}">
                </div>
            </a>
        </div>
        @empty 
        <div class="column is-12-mobile spotlight__poster">
            <p>No results could be found for your query "{{$query}}". Try again.</p>
        </div>
        @endforelse
    </div>
</section>