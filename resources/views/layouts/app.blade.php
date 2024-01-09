<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Awesome components  @yield('title')</title>
        @stack('styles')
        @vite('resources/css/app.css')
        @vite('resources/js/sliderProducts.js')
    </head>
    <body class="antialiased max-w-[2600px]">
        <header class="p-5 bg-black">
            <div class="md:flex justify-between items-center">
                <div class="md:w-3/12">
                    <a href="{{ route('index') }}">
                        <img src="{{ asset('img/logo/Logo7.png') }}" alt="logo company">
                    </a>
                </div>

                <div class="md:w-6/12">
                    <form class="flex gap-2 mt-3" action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mb-3 w-full">
                            <input
                                id="search"
                                name="search"
                                type="text"
                                placeholder="Search"
                                class="p-2 w-full rounded-lg"
                                value="{{ old('search') }}"
                            />
                        </div>
        
                        <button type="submit" class="cursor-pointer h-10">
                            <img class="bg-sky-200 rounded-lg w-[2.70rem] mt-[0.05rem] hover:bg-sky-300" src="/img/lens.svg" alt="search icon">
                        </button>
                    </form>
                </div>

                <nav class="border-gray-200 bg-gray-50 md:bg-black rounded-lg">
                    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4 md:p-0">
                        <span class="self-center text-2xl font-semibold  md:hidden">Menu</span>
                      <button data-collapse-toggle="navbar-hamburger" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg hover:bg-gray-100 md:hidden" aria-controls="navbar-hamburger" aria-expanded="false">
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                      </button>
                      <div class="w-full hidden md:flex mt-2 md:mt-0" id="navbar-hamburger">
                        <ul class="flex flex-col md:flex-row gap-2 font-medium rounded-lg bg-gray-50 md:bg-black">
                          <li>
                            <a href="{{ route('register') }}" class="block md:text-white p-1 md:p-0 rounded hover:bg-sky-200 md:hover:text-sky-200 md:bg-black md:hover:bg-inherit">Register</a>
                          </li>
                          <li>
                            <a href="{{ route('login') }}" class="block md:text-white p-1 md:p-0 rounded hover:bg-sky-200 md:hover:text-sky-200 md:bg-black md:hover:bg-inherit">Login</a>
                          </li>
                          <li>
                            <a href="#" class="block md:text-white p-1 md:p-0 rounded hover:bg-sky-200 md:hover:text-sky-200 md:bg-black md:hover:bg-inherit">Components</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                </nav>
            </div>
        </header>

        @yield('title')

        @yield('content')
        
        <footer class="p-5 bg-black flex flex-col items-center mt-5">
            <div class="flex gap-5">
                <a class="text-white underline hover:text-zinc-500" href="#">Terms & conditions</a>
                <a class="text-white underline hover:text-zinc-500" href="#">Privacy policy</a>
            </div>

            <div>
                <div class="text-1xl text-white font-black">Pedro Amair - All rights reserved &#9400 {{ date('Y') }}</div>
            </div>
        </footer>
    </body>
</html>