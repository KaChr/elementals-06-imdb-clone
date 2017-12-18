<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    @include('includes.head')
    <body>
        @include('includes/nav')
        @include('includes/hero')
        <div class="container">
            <section class="section">
                @include('includes/person')
            </section>
        </div>
        @include('includes/footer')
    </body>
</html>
 


<!-- Laravel login -->
<!-- <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif
        </div> -->