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
                <hr>
                <h1 class="title">Feature - Big</h1>
                @include('includes.hero')

                <hr>
                <h1 class="title">Takeover</h1>
                @include('includes.takeover')

                <hr>
                <h1 class="title">Divider</h1>
                @include('includes.divider')

                <h1 class="title">Review block, with divider</h1>
                @include('includes.reviews')

            </div>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
