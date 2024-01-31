<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Awesome components  @yield('title')</title>
        @stack('styles')
        @vite('resources/css/app.css')
        @vite('resources/js/sliderProducts.js')
        @livewireStyles
    </head>
    <body class="antialiased max-w-[2600px] bg-gray-200 flex flex-col min-h-screen">
        <header class="p-5 bg-black">
            <div class="md:flex justify-between items-center">
                <div class="md:w-3/12">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('img/logo/Logo7.png') }}" alt="logo company">
                    </a>
                </div>

                <div class="md:w-6/12">
                    <form class="flex gap-2 mt-3" action="{{route('searchs.index', ['general', 'search'])}}" method="GET">
                        <div class="mb-3 w-full">
                            <input
                                id="search"
                                name="search"
                                type="text"
                                placeholder="Type to search"
                                class="p-2 w-full rounded-lg"
                                value=""
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
                        <ul class="flex flex-col md:flex-row gap-2 md:gap-8 font-medium rounded-lg bg-gray-50 md:bg-black items-center">
                            @auth
                                <li>
                                    <a href="{{ route('profile', auth()->user()->username) }}" class="block underline md:text-white p-1 md:p-0 rounded hover:bg-sky-200 md:hover:text-sky-200 md:bg-black md:hover:bg-inherit font-bold">{{auth()->user()->username}}</span></a>
                                </li>
                            @endauth
                            @guest
                                <li>
                                    <a href="{{ route('register') }}" class="block md:text-white p-1 md:p-0 rounded hover:bg-sky-200 md:hover:text-sky-200 md:bg-black md:hover:bg-inherit">Register</a>
                                </li>
                                <li>
                                    <a href="{{ route('login') }}" class="block md:text-white p-1 md:p-0 rounded hover:bg-sky-200 md:hover:text-sky-200 md:bg-black md:hover:bg-inherit">Login</a>
                                </li>
                            @endguest
                          <li>
                            <a href="#" class="block md:text-white p-1 md:p-0 rounded hover:bg-sky-200 md:hover:text-sky-200 md:bg-black md:hover:bg-inherit">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                  </svg>
                                  
                            </a>
                          </li>
                          @auth
                            <li>
                                <form method="POST" action="{{route('logout')}}">
                                    @csrf
                                    <button type="submit" class="block md:text-white p-1 md:p-0 rounded hover:bg-sky-200 md:hover:text-sky-200 md:bg-black md:hover:bg-inherit">
                                        Sign out
                                    </button>
                                </form>
                            </li>
                          @endauth
                        </ul>
                      </div>
                    </div>
                </nav>
            </div>
        </header>

        <div class="w-full lg:w-4/5 mx-auto bg-white">
            <h1 class="text-3xl text-center font-semibold">@yield('title')</h1>

            @yield('content')
        </div>
        
        <footer class="p-5 bg-black flex flex-col items-center mt-auto">
            <div class="flex gap-5">
                <a class="text-white underline hover:text-zinc-500" href="#">Terms & conditions</a>
                <a class="text-white underline hover:text-zinc-500" href="#">Privacy policy</a>
            </div>

            <div>
                <div class="text-1xl text-white font-black">Pedro Amair - All rights reserved &#9400 {{ date('Y') }}</div>
            </div>
        </footer>
        @livewireScripts
    </body>
</html>