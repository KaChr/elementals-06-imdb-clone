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
            @include('includes.typography')
            @include('includes.hero')
        </div>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
