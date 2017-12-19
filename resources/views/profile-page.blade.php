<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    @include('includes.head')
    <style>
    body {
    background-color: #060B0E;
    }
    #user-profilepage {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin: 1rem;
        margin-bottom: 0;
        color: white;
    }
    h4 {
        margin-top: 0.5rem;

    }
    .image img {
        border-radius: 50%;
    }


    .divider hr {
        background-color: #1F2F39;
        margin-top: 0.7rem;
        margin-bottom: 0;

    }
    .divider {
        margin-bottom: 0;
        margin-right: 1rem;
        margin-bottom: 1rem;

    }

    .users-watchlist-button {
        display: flex;
        justify-content: center;
        margin: 0.8rem;
    }

    .users-lists-profile {
        margin: 1rem;
    }

    .divider-list-profile hr{
        margin-right: 1rem;
        margin-left: 1rem;
        margin-top: 0;
        background-color: #1F2F39;
    }


    </style>
    <body>
        @include('includes.headertemp')

    <!-- Users profile -->
    <section id="user-profilepage">
        <!-- <h4> Profile </h4> -->
        <figure class="image is-96x96">
            <img src="https://bulma.io/images/placeholders/96x96.png">
        </figure> 
        <h4> Izabel Rosén </h4>
            <p> Edit 
            <i class="fa fa-cog" aria-hidden="true"></i>
            </p>
        <div class="divider">
            <hr>
        </div>
    </section>

    <!-- Watchlist button -->
    <div class="users-watchlist-button">
    <a class="button is-medium is-warning">WATCHLIST</a>
    </div>

    <!-- Users lists -->
    <div class="users-lists-profile">
        <div class="divider">
            <div class="divider__info is-flex">
                <h5 class="divider__title">LATEST REVIEWS</h5>
                <a href="#">VIEW ALL</a>
            </div>
            <span class="divider__line"></span>
        </div>
        <section class="columns">
            <div class="column">
                <div class="columns is-mobile">
                    <div class="column is-two-fifths-mobile">
                        <div class="review__poster">
                            <span class="review__rating">7.7</span>
                            <img src="https://image.tmdb.org/t/p/original/9E2y5Q7WlCVNEhP5GiVTjhEhx1o.jpg" alt="">
                        </div>
                    </div>
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
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Vestibulum in maximus turpis.
                        </p>
                        <button class="button button--small button--solid-yellow">READ MORE</button>
                    </div>  
                </div>
        </div>

        <div class="divider-list-profile">
            <hr>
        </div>

        <div class="divider">
            <div class="divider__info is-flex">
                <h5 class="divider__title">LATEST RATINGS</h5>
                <a href="#">VIEW ALL</a>
            </div>
            <span class="divider__line"></span>
        </div>

        <div class="divider">
            <div class="divider__info is-flex">
                <h5 class="divider__title">RECENTLY VIEWED</h5>
                <a href="#">VIEW ALL</a>
            </div>
            <span class="divider__line"></span>
        </div>


    </div>



@include('includes.footer')
</body>
</html>