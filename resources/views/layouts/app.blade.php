<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    @include('includes.head')
    <body>
        <div id="app">
            @include('includes.navigation')
            @yield('content')
        </div>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
