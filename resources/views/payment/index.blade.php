@extends('layouts.app')

@section('title')
<div class="my-5">
    Your payment method
</div>
@endsection

@section('content')
    <div class="grid grid-cols-1">
        
        <div class="order-2 md:order-1">
            <livewire:payment-methods /> 
        </div>

        <div class="flex flex-col xl:flex-row md:justify-between order-1 md:order-2 md:mt-16">
            <div class="order-2 xl:order-none">
                <livewire:show-payment-method />
            </div>
            <div class="m-4 order-1 xl:order-none md:mx-auto md:w-2/3 xl:w-auto md:h-64 bg-gray-100 p-5 xl:m-4 rounded-lg shadow-md">
                <h2 class="uppercase font-bold text-xl text-center">Payment details</h2>

                <div class="mt-5">
                    <p class="text-xl mb-3">Items selected: <span class="font-semibold">{{Cart::count()}} @choice('unit|units', Cart::count())</span></p>
                    <div class="flex flex-col items-end">
                        <p class="text-xl">Subtotal: <span class="font-semibold">{{Cart::subtotal()}} $</span></p>
                        <p class="text-xl border-b-2">Tax: <span class="font-semibold">{{Cart::tax()}} $</span></p>
                        <p class="text-xl">Total: <span class="font-semibold">{{Cart::total()}} $</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mx-4 my-8">
        <a class="uppercase text-white  p-5  bg-sky-600 hover:bg-sky-700 rounded-lg" href="{{route('cart.index')}}">Back to cart</a>
    </div>
@endsection