<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    @include('includes.head')
    <body>
        @include('includes/headertemp')
        @include('includes/hero')
        <div class="container">
            <section class="section">
                @include('includes/person')
            </section>
        </div>
        @include('includes/footer')
    </body>
</html>
