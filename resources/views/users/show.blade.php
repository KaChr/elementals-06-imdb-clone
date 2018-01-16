@extends('layouts.app')

@section('content')
    <section class="user">
        <figure class="image is-96x96 user__avatar">
            <img src="{{ $user->avatar }}">
        </figure> 
        
        <h4 class="user__name"> {{ $user->name }} </h4>
        <p class="user__email">{{ $user->email }}</p>
        <a href="#" class="user__edit"> Edit <i class="fa fa-cog" aria-hidden="true"></i></a>
        <div class="divider divider__profile">
            <hr>
        </div>
    </section>


    <!-- User list: Reviews -->
    @include('includes.reviews')
        @include('includes.divider', ['title' => 'LATEST REVIEWS'])
        <!-- Movie poster with text and user avatar -->
        <section class="columns">
            <div class="column">
                <div class="columns is-mobile">

                    <div class="column is-two-fifths-mobile">
                        <div class="review__poster">
                            <img src="https://image.tmdb.org/t/p/original/9E2y5Q7WlCVNEhP5GiVTjhEhx1o.jpg" alt="">
                        </div>
                    </div> <!-- end column is two fifths mobile -->

                    <div class="column">

                        <div class="review__info is-flex">
                            <span class="review__avatar">
                                <img src="https://avatars1.githubusercontent.com/u/24225542?s=460&v=4" alt="avatar">
                            </span>
                            <div>
                                <h4 class="review__title">This is the title</h4>
                                <p class="review__author">by Joakim Unge</p>
                            </div>
                        </div>

                        <div class="column is-two-fifths-mobile">
                            <div class="review__poster">
                                <span class="review__rating latest__rating">7.7</span>
                            </div>
                        </div> <!-- end column is two fifths mobile -->
                    </div>  <!-- end column-->

                </div> <!-- end columns is mobile -->
            </div> <!-- end column -->
        </section> <!-- end columns -->


        <!-- User: recently viewed -->
        <!-- Divider -->
        <div class="divider">
            <div class="divider__info is-flex">
                <h5 class="divider__title">RECENTLY VIEWED</h5>
                <a href="#">VIEW ALL</a>
            </div>
            <span class="divider__line"></span>
        </div>
        <!-- Divider ends -->

        <section class="columns">
            <div class="column">
                <div class="columns is-mobile">

                    <div class="column is-two-fourths-mobile">
                        <div class="review__poster">
                            <img src="https://image.tmdb.org/t/p/original/9E2y5Q7WlCVNEhP5GiVTjhEhx1o.jpg" alt="">
                            <p> This is the title </p>
                        </div>
                    </div> <!-- end column is two fifths mobile -->

                    <div class="column is-two-fourths-mobile">
                        <div class="review__poster">
                            <img src="https://image.tmdb.org/t/p/original/9E2y5Q7WlCVNEhP5GiVTjhEhx1o.jpg" alt="">
                            <p> This is the title </p>
                        </div>
                    </div> <!-- end column is two fifths mobile -->

                    <div class="column is-two-fourths-mobile">
                        <div class="review__poster">
                            <img src="https://image.tmdb.org/t/p/original/9E2y5Q7WlCVNEhP5GiVTjhEhx1o.jpg" alt="">
                            <p> This is the title </p>
                        </div>
                    </div> <!-- end column is two fourths mobile -->
                </div> <!-- end columns is mobile -->
            </div> <!-- end column -->
        </section> <!-- end columns -->
</section> <!-- end section -->
@endsection