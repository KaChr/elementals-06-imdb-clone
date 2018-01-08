<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    @include('includes.head')
    <body>
        <div id="app">
            @include('includes.navigation')
            @yield('content')
            @include('includes/footer')
        </div>
    </body>
</html>
