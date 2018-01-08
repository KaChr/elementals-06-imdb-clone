<div class="divider">
    <div class="divider__info is-flex">
        <h5 class="divider__title">LATEST REVIEWS</h5>
        <a href="#">VIEW ALL</a>
    </div>
    <span class="divider__line"></span>
</div>
<section class="columns">
    @foreach($reviews as $review)
    <div class="column">
        <div class="columns is-mobile">
            <div class="column is-two-fifths-mobile">
                <a href="">  
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
                        <p class="review__author">{{ $review->name }}</p>
                    </div>
                </div>
                <p>
                    {{ $review->body }}
                </p>
                <button class="button button--small button--solid-yellow">READ MORE</button>
            </div>  
        </div>
    </div>
    @endforeach
</section>