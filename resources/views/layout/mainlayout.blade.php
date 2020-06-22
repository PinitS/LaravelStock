<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>

        @include('layout.partials.head')

    </head>

    <body>

        @include('layout.partials.nav')
        <div class = "container mt-3 pt-3 text-center">
            <h2>Stock Farm Thailand</h2>
        </div>

        <div class = "container mt-3 pt-3 text-center">
            @yield('content')
        </div>
        @include('layout.partials.footer')

    </body>
</html>
