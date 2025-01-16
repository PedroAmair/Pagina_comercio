<div>
    <li class="hidden md:flex items-center"> 
        <a href="{{route('cart.index')}}" class="md:text-white p-1 md:p-0 rounded hover:bg-sky-200 md:hover:text-sky-200 md:bg-black md:hover:bg-inherit">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
            </svg>   
        </a>
        <span id="cartShops" class="px-1 text-white font-semibold bg-sky-800 rounded-sm {{$cartCount >= 1 ? '' : 'hidden'}}">{{$cartCount}}</span>
    </li>
</div>
