@extends('layouts.app')

@section('title')
<div class="my-5">
    Confirmed purchase!
</div>
@endsection

@section('content')
   <div class="grid grid-cols-1 md:grid-cols-3 items-center justify-center m-5">
        <div class="bg-gray-100 p-5 rounded-lg border-2 md:col-span-2">
            <p class="text-lg text-center md:text-justify">
                Thank you for shopping with Awesome Components, 
                we hope you enjoy your products. Your purchase is 
                being validated and in the next 48 hours, when payment
                is confirmed, we will be sending you your products!
            </p>
        </div>

        <div class="w-full md:w-auto justify-self-center">
            <a 
                class="block text-center bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer
                uppercase font-bold w-full p-3 text-white rounded-lg my-5" 
                href="{{route('shopping.index', auth()->user()->username)}}"
            >
                Go to my purchased products
            </a>
            <a 
                class="block text-center bg-sky-800 hover:bg-sky-900 transition-colors cursor-pointer
                uppercase font-bold w-full p-3 text-white rounded-lg my-5" 
                href="{{route('personal', auth()->user()->username)}}"
            >
                Go to my personal space
            </a>
        </div>
   </div>

   <div class="flex flex-col md:flex-row lg:justify-between my-5">
        <div>
            <div class="flex flex-col md:flex-row items-center justify-center md:justify-start">
                <img
                    src="{{asset('img/shoppingCart.png')}}" 
                    alt="Shopping cart image"
                    class="w-32 mb-[-1rem]"
                >
    
                <div>
                    <p class="text-lg font-bold md:ml-[-2rem]">What you bought:</p>
                </div>
            </div>
    
            <div class="grid grid-cols-1 items-center p-5">
                @foreach ($purchasedProducts[0]->publications as $product)
                <div class="flex items-center gap-2 border-2 justify-center md:justify-start">
                    <img class="w-24 ml-1" src="{{asset('uploads').'/'.$product->image[0]}}" alt="product image">
                    <p class="text-lg">{{$product->brand === 'amd' || $product->brand === 'evga' || $product->brand === 'msi' || $product->brand === 'xfx' ? strtoupper($product->brand).' '.$product->product :  ucwords($product->brand).' '.$product->product}}</p>
                    <p class="font-bold">X {{$product->pivot->quantity}} @choice('unit|units', $product->pivot->quantity)</p>
                </div>
                @endforeach
            </div>

            <div class="flex flex-col md:flex-row items-center justify-center md:gap-10 md:justify-start mt-10">
                <img
                    src="{{asset('img/deliveryTruck.png')}}" 
                    alt="Shoppinn car image"
                    class="w-16 md:mb-[-1rem] md:ml-7"
                >
    
                <div>
                    <p class="text-lg font-bold md:ml-[-2rem]">Your shipping address:</p>
                </div>
            </div>
    
            <div class="grid grid-cols-1 items-center p-5">
                <div class="text-center md:text-left border-2 md:border-none">
                    <p class="text-lg ml-1">
                        {{$userDirection->direction_line_1. ". ". $userDirection->direction_line_2}}
                    </p>
                    <p class="text-lg ml-1">
                        {{$userDirection->zip_code." "."-"." ". $userDirection->city.","." ". $userDirection->state}}
                    </p>
                    <p class="text-lg ml-1 uppercase font-bold">
                        {{$userDirection->country}}
                    </p>
                </div>
            </div>
    
            <div class="m-5">
                <p class="text-center md:text-justify">
                    At awesome components we are always thinking of you. 
                    You can check our <a class="text-green-700 font-bold" href="/">offers section</a> to get the product 
                    of your dreams at the best price!
                </p>
            </div>
        </div>

        <div class=" flex flex-col items-center justify-center w-full md:w-2/3 xl:w-2/4 2xl:w-1/3 mt-4">
            <h2 class="text-lg font-bold mb-2">You might be interested</h2>
            <div class="grid grid-cols-2 gap-10 md:gap-6">
                @foreach ($products as $product)
                    <div class="w-36">
                        <img class="w-28" src="{{asset('uploads').'/'.$product->image[0]}}" alt="product image">
                        <a class="font-bold" href="{{route('searchs.show', $product->id)}}">{{$product->brand === 'amd' || $product->brand === 'evga' || $product->brand === 'msi' || $product->brand === 'xfx' ? strtoupper($product->brand).' '.$product->product :  ucwords($product->brand).' '.$product->product}}</a>
                    </div>
                @endforeach
            </div>
        </div>
   </div>
@endsection