<div class="divider">
    <div class="divider__info is-flex">
        <h5 class="divider__title">LATEST REVIEWS</h5>
        <a href="#">VIEW ALL</a>
    </div>
    <span class="divider__line"></span>
</div>
@foreach($reviews as $index => $review)
    @if($index % 2 === 0)
    <section class="columns">
    @endif
        <div class="column">
            <div class="columns is-mobile">
                <div class="column is-two-fifths-mobile is-3-desktop">
                    <a href="/movies/{{$review->item_id}}/reviews/{{$review->id}}">  
                        <div class="review__poster">
                            <span class="review__rating">{{ $review->review_rating }}</span>
                            <img src="{{ $review->poster }}" alt="">
                        </div>
                    </a>
                </div>
                <div class="column">
                    <div class="review__info is-flex">
                        <span class="review__avatar">
                            <img src="https://avatars1.githubusercontent.com/u/24225542?s=460&v=4" alt="avatar">
                        </span>
                        <div>
                            <h4 class="review__title">{{ $review->title }}</h4>
                            <a href="/users/{{ $review->author_id }}"><p class="review__author">{{ $review->name }}</p></a>
                        </div>
                    </div>
                    <p class="review__body">
                        {{ $review->body }}
                    </p>
                    <a href="/movies/{{$review->item_id}}/reviews/{{$review->id}}">
                        <button class="button button--small button--solid-yellow">READ MORE</button>
                    </a>
                </div>  
            </div>
        </div>
    @if($index % 2 !== 0)
    </section>
    @endif
@endforeach