<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Awesome components  @yield('title')</title>
        @stack('styles')
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
    </head>
    <body class="antialiased">
        <header class="p-2 bg-gray-100 shadow-lg">
            <div class="md:flex justify-between items-center">
                <div class="md:w-3/12">
                    <a href="{{ route('products.index') }}">
                        <img src="{{ asset('img/logo/Logo4.png') }}" alt="logo company">
                    </a>
                </div>
            </div>
        </header>

        @yield('title')

        @yield('content')
        
    </body>
</html>