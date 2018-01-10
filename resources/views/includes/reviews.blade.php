<div class="divider">
    <div class="divider__info is-flex">
        <h5 class="divider__title">LATEST REVIEWS</h5>
        <a href="#">VIEW ALL</a>
    </div>
    <span class="divider__line"></span>
</div>
<section class="columns">
@forelse ($reviews->slice(0, 2) as $review)
    <div class="column">
        <div class="columns is-mobile">
            <div class="column is-two-fifths-mobile">
                <div class="review__poster">
                    <span class="review__rating">{{$review->rating}}</span>
                    <img src="{{$poster}}" alt="">
                </div>
            </div>
            <div class="column">
                <div class="review__info is-flex">
                    <span class="review__avatar">
                        <!-- TODO FIX THIS <img src="{{-- $review->author->avatar --}}" alt="avatar"> -->
                        <img src="{{Auth::user()->avatar}}" alt="avatar">
                    </span>
                    <div>
                        <h4 class="review__title">{{$review->title}}</h4>
                        <!-- TODO: FIX THIS <p class="review__author">by {{-- $review->author->name --}}</p> -->
                        <p class="review__author">by {{Auth::user()->name}}</p>
                    </div>
                </div>
                <p>
                    {{$review->body}}
                </p>
                <button class="button button--small button--solid-yellow">READ MORE</button>
            </div>  
        </div>
    </div>
@empty
    <p>No reviews</p>
@endforelse
</section>