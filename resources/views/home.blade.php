@extends('layouts.app')

@section('content')

    <div id="default-carousel" class="relative w-full" data-carousel="slide" data-carousel-interval="10000">
        <!-- Carousel wrapper -->
        <div class="relative h-36 overflow-hidden md:h-[22rem] xl:h-[28rem] 2xl:h-[40rem]">
            <!-- Item 1 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{ asset('img/carrousel/ryzen.webp') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="ryzen image">
            </div>
            <!-- Item 2 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{ asset('img/carrousel/videoCard.webp') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="videoCard image">
            </div>
            <!-- Item 3 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{ asset('img/carrousel/earphones.webp') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="earphones image">
            </div>
            <!-- Item 4 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{ asset('img/carrousel/assistant.webp') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="assistant image">
            </div>
        </div>
        <!-- Slider indicators -->
        <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
            <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
        </div>
        <!-- Slider controls -->
        <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
            <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
            <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>

    <div class="relative p-5 mt-4">
        <h2 class="text-black text-3xl mb-5">Choose your CPU</h2>
        <div>
            <div class="absolute cursor-pointer object-cover md:p-2 left-1 top-32 md:top-28 2xl:p-3 2xl:top-32 min-[2500px]:top-40 translate-x-0 md:translate-y-3 bg-sky-800 hover:bg-sky-900 rounded-lg" id="leftArrow">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M5 12l14 0" />
                    <path d="M5 12l6 6" />
                    <path d="M5 12l6 -6" />
                </svg>
            </div>

            <x-processors-list :processors="$processors" />
    
            <div class="absolute cursor-pointer object-cover md:p-2 right-0 top-32 md:top-28 2xl:p-3 2xl:top-32 min-[2500px]:top-40 translate-x-0 md:translate-y-3 bg-sky-800 hover:bg-sky-900 rounded-lg" id="rightArrow">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-right" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M5 12l14 0" />
                    <path d="M13 18l6 -6" />
                    <path d="M13 6l6 6" />
                </svg>
            </div>
        </div>
    </div>

    <div class="mt-4 p-5">
        <h2 class="text-black text-3xl mb-5">What are you looking for?</h2>

        <div class="grid md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-6 gap-3">
            <div class="relative hover:visible hover:opacity-100 shadow-xl shadow-gray-800">
                <a href="{{route('searchs.index', ['category', 'motherboard'])}}">
                    <img src="{{ asset('img/components/motherboard.webp') }}" alt="motherboard image">
                    <p class="absolute flex justify-center items-center inset-0 bg-black text-white font-bold text-2xl underline underline-offset-8 decoration-solid decoration-red-950 uppercase transition-opacity duration-400 opacity-0 hover:visible hover:opacity-100 hover:border-2 border-white">Motherboards</p>
                </a>
            </div>

            <div class="relative hover:visible hover:opacity-100 shadow-xl shadow-gray-800">
                <a href="{{route('searchs.index', ['category', 'processor'])}}">
                    <img src="{{ asset('img/components/processor.webp') }}" alt="processor image">
                    <p class="absolute flex justify-center items-center inset-0 bg-black text-white font-bold text-2xl underline underline-offset-8 decoration-solid decoration-red-950 uppercase transition-opacity duration-400 opacity-0 hover:visible hover:opacity-100 hover:border-2 border-white">CPUs</p>
                </a>
            </div>

            <div class="relative hover:visible hover:opacity-100 shadow-xl shadow-gray-800">
                <a href="{{route('searchs.index', ['category', 'graphic card'])}}">
                    <img src="{{ asset('img/components/graphicCard.webp') }}" alt="graphic card image">
                    <p class="absolute flex justify-center items-center inset-0 bg-black text-white font-bold text-2xl underline underline-offset-8 decoration-solid decoration-red-950 uppercase transition-opacity duration-400 opacity-0 hover:visible hover:opacity-100 hover:border-2 border-white">Graphics Cards</p>
                </a>
            </div>

            <div class="relative hover:visible hover:opacity-100 shadow-xl shadow-gray-800">
                <a href="{{route('searchs.index', ['category', 'ram memory'])}}">
                    <img src="{{ asset('img/components/ram.webp') }}" alt="graphic card image">
                    <p class="absolute flex justify-center items-center inset-0 bg-black text-white font-bold text-2xl underline underline-offset-8 decoration-solid decoration-red-950 uppercase transition-opacity duration-400 opacity-0 hover:visible hover:opacity-100 hover:border-2 border-white">RAM sticks</p>
                </a>
            </div>

            <div class="relative hover:visible hover:opacity-100 shadow-xl shadow-gray-800">
                <a href="{{route('searchs.index', ['category', 'ssd'])}}">
                    <img src="{{ asset('img/components/ssd.webp') }}" alt="graphic card image">
                    <p class="absolute flex justify-center items-center inset-0 bg-black text-white font-bold text-2xl underline underline-offset-8 decoration-solid decoration-red-950 uppercase transition-opacity duration-400 opacity-0 hover:visible hover:opacity-100 hover:border-2 border-white text-center">Solid State Drives</p>
                </a>
            </div>

            <div class="relative hover:visible hover:opacity-100 shadow-xl shadow-gray-800">
                <a href="{{route('searchs.index', ['category', 'cases'])}}">
                    <img src="{{ asset('img/components/case.webp') }}" alt="graphic card image">
                    <p class="absolute flex justify-center items-center inset-0 bg-black text-white font-bold text-2xl underline underline-offset-8 decoration-solid decoration-red-950 uppercase transition-opacity duration-400 opacity-0 hover:visible hover:opacity-100 hover:border-2 border-white">PC Cases</p>
                </a>
            </div>
        </div>
    </div>

    <div class="relative p-5 mt-4">
        <h2 class="text-black text-3xl mb-5">Our best deals</h2>
        <div>
            <div class="absolute cursor-pointer object-cover md:p-2 left-1 top-32 md:top-28 2xl:p-3 2xl:top-32 min-[2500px]:top-40 translate-x-0 md:translate-y-3 bg-sky-800 hover:bg-sky-900 rounded-lg" id="leftArrowOf">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M5 12l14 0" />
                    <path d="M5 12l6 6" />
                    <path d="M5 12l6 -6" />
                </svg>
            </div>
    
            <x-products-list :discounts="$discounts" />
    
            <div class="absolute cursor-pointer object-cover md:p-2 right-0 top-32 md:top-28 2xl:p-3 2xl:top-32 min-[2500px]:top-40 translate-x-0 md:translate-y-3 bg-sky-800 hover:bg-sky-900 rounded-lg" id="rightArrowOf">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-right" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M5 12l14 0" />
                    <path d="M13 18l6 -6" />
                    <path d="M13 6l6 6" />
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-gradient-to-r from-sky-300 to-sky-500 mt-4 flex flex-col md:flex-row justify-center">
        <div class="flex flex-col justify-center">
            <div class="flex flex-col gap-2 items-start justify-center ml-5">
                <h2 class="text-black text-4xl mb-2">We offer:</h2>
                <div class="flex justify-center items-center">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-hand-ring-finger" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M8 13v-2.5a1.5 1.5 0 0 1 3 0v1.5" />
                            <path d="M17 11.5a1.5 1.5 0 0 1 3 0v4.5a6 6 0 0 1 -6 6h-2h.208a6 6 0 0 1 -5.012 -2.7a69.74 69.74 0 0 1 -.196 -.3c-.312 -.479 -1.407 -2.388 -3.286 -5.728a1.5 1.5 0 0 1 .536 -2.022a1.867 1.867 0 0 1 2.28 .28l1.47 1.47" />
                            <path d="M11 11.5v-2a1.5 1.5 0 1 1 3 0v2.5" />
                            <path d="M14 12v-6.5a1.5 1.5 0 0 1 3 0v6.5" />
                          </svg>
                    </div>
                    <p class="text-black text-base ml-2">Wide variety of products to satisfy all the needs of our clients</p>
                </div>
    
                <div class="flex justify-center items-center">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-hand-two-fingers" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M8 13v-8.5a1.5 1.5 0 0 1 3 0v7.5" />
                            <path d="M17 11.5a1.5 1.5 0 0 1 3 0v4.5a6 6 0 0 1 -6 6h-2h.208a6 6 0 0 1 -5.012 -2.7a69.74 69.74 0 0 1 -.196 -.3c-.312 -.479 -1.407 -2.388 -3.286 -5.728a1.5 1.5 0 0 1 .536 -2.022a1.867 1.867 0 0 1 2.28 .28l1.47 1.47" />
                            <path d="M14 10.5a1.5 1.5 0 0 1 3 0v1.5" />
                            <path d="M11 5.5v-2a1.5 1.5 0 1 1 3 0v8.5" />
                        </svg>
                    </div>
                    <p class="text-black text-base ml-2">Highest quality technology. Manufactured with the most resistant components even for the most extreme situations</p>
                </div>
               
                <div class="flex justify-center items-center">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-hand-three-fingers" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M8 13v-8.5a1.5 1.5 0 0 1 3 0v7.5" />
                            <path d="M17 11.5a1.5 1.5 0 0 1 3 0v4.5a6 6 0 0 1 -6 6h-2h.208a6 6 0 0 1 -5.012 -2.7a69.74 69.74 0 0 1 -.196 -.3c-.312 -.479 -1.407 -2.388 -3.286 -5.728a1.5 1.5 0 0 1 .536 -2.022a1.867 1.867 0 0 1 2.28 .28l1.47 1.47" />
                            <path d="M11 5.5v-2a1.5 1.5 0 1 1 3 0v8.5" />
                            <path d="M14 5.5a1.5 1.5 0 0 1 3 0v6.5" />
                        </svg>
                    </div>
                    <p class="text-black text-base ml-2">90 days warranty on all products purchased in our store</p>
                </div>
            </div>
        
            <div class="flex justify-center mt-4 md:mt-10 md:ml-48">
                <a href="{{ route('register') }}" class="text-white w-2/3 md:w-auto bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-md px-10 py-5 text-center mr-2 mb-2">Register now</a>
            </div>      
        </div>
        <img loading="lazy" class="h-96 hidden md:block" src="{{ asset('img/offerSection/pointingMen.png') }}" alt="pointing men image">
    </div>

    <div class="mt-4 p-5">
        <h2 class="text-black text-3xl mb-5">Search for products of your favorite brand</h2>

        <div class="mt-5 grid justify-items-center grid-cols-2 md:grid-cols-4 xl:grid-cols-8 gap-5">
            <div class="transition hover:scale-125">
                <a href="{{route('searchs.index', ['brand', 'AMD'])}}">
                    <img class="w-28 h-28 p-3" src="{{ asset('img/companiesLogos/amd.png')}}" alt="intel logo">
                </a>
            </div>

            <div class="transition hover:scale-125">
                <a href="{{route('searchs.index', ['brand', 'INTEL'])}}">
                    <img class="w-28 h-28 p-3" src="{{ asset('img/companiesLogos/intel.png')}}" alt="intel logo">
                </a>
            </div>

            <div class="transition hover:scale-125">
                <a href="{{route('searchs.index', ['brand', 'NVIDIA'])}}">
                    <img class="w-28 h-28 p-3" src="{{ asset('img/companiesLogos/nvidia.png')}}" alt="nvidia logo">
                </a>
            </div>

            <div class="transition hover:scale-125">
                <a href="{{route('searchs.index', ['brand', 'KINGSTON'])}}">
                    <img class="w-28 h-28 p-3" src="{{ asset('img/companiesLogos/kingston.png')}}" alt="kingston logo">
                </a>
            </div>

            <div class="transition hover:scale-125">
                <a href="{{route('searchs.index', ['brand', 'THERMALTAKE'])}}">
                    <img class="w-28 h-28 p-3" src="{{ asset('img/companiesLogos/thermaltake.png')}}" alt="thermaltake logo">
                </a>
                </form>
            </div>

            <div class="transition hover:scale-125">
                <a href="{{route('searchs.index', ['brand', 'MSI'])}}">
                    <img class="w-28 h-28 p-3" src="{{ asset('img/companiesLogos/msi.png')}}" alt="msi logo">
                </a>
                </form>
            </div>

            <div class="transition hover:scale-125">
                <a href="{{route('searchs.index', ['brand', 'WD'])}}">
                    <img class="w-28 h-28 p-3" src="{{ asset('img/companiesLogos/wd.png')}}" alt="western digital logo">
                </a>
                </form>
            </div>

            <div class="transition hover:scale-125">
                <a href="{{route('searchs.index', ['brand', 'CM'])}}">
                    <img class="w-28 h-28 p-3" src="{{ asset('img/companiesLogos/coolerMaster.png')}}" alt="cooler master logo">
                </a>
                </form>
            </div>
        </div>
    </div>

    <section class="mt-4 p-5">
        <h2 class="text-black text-3xl mb-5">Don't forget to check our news...</h2>
        <div class="bg-blue-950 py-5 px-5 grid gap-2 md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 justify-items-center">
            <article class="max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                <a href="#">
                    <img class="rounded-t-lg" src="{{ asset('img/news/rx7600.webp') }}" alt="rx 7600 image" />
                </a>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">The new RX 7600 is out now</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700">
                        AMD has released the new replacement for the famous RX 6600. It has the following technical specifications...
                    </p>
                    <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600">
                        Read more
                        <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </a>
                </div>
            </article>

            <article class="max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                <a href="#">
                    <img class="rounded-t-lg" src="{{ asset('img/news/steam.webp') }}" alt="steam image" />
                </a>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">New games launched on Steam</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700">
                        More than a dozen free titles have recently been launched on the popular digital gaming platform...
                    </p>
                    <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Read more
                        <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </a>
                </div>
            </article>

            <article class="max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                <a href="#">
                    <img class="rounded-t-lg" src="{{ asset('img/news/rtx4060ti.webp') }}" alt="rtx 4060ti image" />
                </a>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">We review the RTX 4060 Ti</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700">
                        Nvidia has sent us an RTX 4060 Ti so we can test it and here's what we have to say about the company's new graphics card...
                    </p>
                    <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                        Read more
                        <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </a>
                </div>
            </article>

            <article class="max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                <a href="#">
                    <img class="rounded-t-lg" src="{{ asset('img/news/14900k.webp') }}" alt="Core i9 14900k" />
                </a>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Intel's king of gaming</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700">
                        The new Intel Core i9 14900K is the best piece of equipment to handle any game you throw at him...
                    </p>
                    <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                        Read more
                        <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </a>
                </div>
            </article>
        </div>      
    </section>
@endsection