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
                <h3>Feature - Big</h3>
                @include('includes.hero')

                <hr>
                <h3>Takeover</h3>
                @include('includes.takeover')
                
                <section class="section">
                    <hr>
                    <h3>Divider</h3>
                    @include('includes.divider')
                </section>

                <section class="section">
                    <h3>Review block</h3>
                    @include('includes.reviews')
                </section>

                <section class="section">
                    <h3>Person block</h3>
                    @include('includes.person')
                </section>

                <section class="section">
                    <h3>Rating diagram</h3>
                    @include('includes.rating')
                </section>
            </div>
            @include('includes.footer')
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
