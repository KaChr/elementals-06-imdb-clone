<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    @include('includes.head')
    <body>
        <div id="app">
                <section class="hero is-dark">
                    <div class="hero-body">
                        <div class="container">
                        <h1 class="title">Component Styleguide</h1>
                        </div>
                    </div>
                </section>
            <div class="container">
                
                @include('includes.typography')
                <h1 class="title">Featured</h1>
                <hr>
                @include('includes.hero')
            </div>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
