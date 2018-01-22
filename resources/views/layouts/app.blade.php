<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    @include('includes.head')
    <body>
        @include('includes.navigation')
        @yield('content')
        @include('includes/footer')
    </body>
</html>
