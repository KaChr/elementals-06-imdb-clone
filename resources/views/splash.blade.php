<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    @include('includes.head')
    <body>
        <div class="app">
            <section class="hero is-fullheight splash">
                <div class="hero-head is-ontop is-flex is-flex-end">
                    <h5><a class="light" href="/home">BROWSE AS GUEST</a></h5>
                </div>
                <div class="hero-body is-ontop">
                    <div class="container has-text-centered">
                        <div class="columns is-centered">
                            <div class="column is-4 is-flex splash__content">
                                <img id="splash__logo" src="{{ asset('images/emdb_logo@1x.png') }}" alt="" width="" height="">
                                <a href="{{ route('login') }}"><button class="button button--big button--solid-blue">Log in</button></a>
                                <a href="{{ route('register') }}"><button class="button button--big button--solid-turquoise">Sign up</button></a> 
                            </div>
                        </div>                             
                    </div>
                </div>
                <div class="splash__overlay"></div>
            </section>
        </div>
    </body>
</html>
