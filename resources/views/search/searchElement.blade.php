@extends('layouts.app')

@section('content')
    @if(session('success'))
    <div id="alert-border-3" class="flex items-center p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800" role="alert">
        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
          <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <div class="ms-3 text-md font-medium">
            {{session('success')}}
        </div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"  data-dismiss-target="#alert-border-3" aria-label="Close">
          <span class="sr-only">Dismiss</span>
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
          </svg>
        </button>
    </div>
    @endif
    <div class="md:flex md:m-4 flex flex-col md:flex-row">
        <div class="w-full md:w-2/3">
            <div class="grid gap-4 justify-items-center">
                <div>
                    <img class="main h-auto max-w-full rounded-lg" src="{{asset('uploads').'/'.$publication->image[0]}}" alt="main image">
                </div>
                <div class="grid grid-cols-5 gap-4">
                    @foreach ($publication->image as $image)
                        <div class="flex items-center justify-center">
                            <img class="{{$loop->index === 0 ? 'active' : ''}} thumbnail cursor-pointer h-auto max-w-full rounded-lg" src="{{asset('uploads').'/'.$image}}" alt="product image {{$loop->index}}">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="w-full md:w-2/3 2xl:w-1/3 bg-gray-100 rounded-lg">
            <div>
                <h2 class="text-center text-3xl mt-2">{{$publication->brand === 'amd' || $publication->brand === 'evga' || $publication->brand === 'msi' || $publication->brand === 'xfx' ? strtoupper($publication->brand).' '.$publication->product :  ucwords($publication->brand).' '.$publication->product}}</h2>
            </div>

            <div>
                <div class=" text-center sm:text-left mt-3 sm:ml-5 text-2xl font-bold">Relevant details</div>
                <div class="flex flex-col sm:flex-row sm:justify-around">
                    <div>
                        <ul class="md:ml-5 text-center sm:text-left mb-5 sm:mb-0">
                            @foreach ($publication->description as $description)
                            <li class="sm:list-disc ml-5 text-xl">{{$loop->index === 5 && $publication->category === 'processor' ? strtoupper($description) : ucfirst($description)}}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="flex justify-around sm:justify-start sm:flex-col sm:gap-3 md:mt-[-.2rem]">
                        <div class="grid md:grid-cols-1 justify-items-center">
                            <div class="text-xl text-center">There still are:</div>
                            <div class="text-2xl font-bold bg-green-200 rounded-full text-center w-1/2 sm:w-16 p-3">{{$publication->quantity}}</div>
                        </div>
                        <div>
                            <div class="text-xl text-center">Price:</div>
                            <div class="text-2xl font-bold text-green-700 text-center">{{$publication->price}} $</div>
                        </div>
                    </div>
                </div>
                <div class="my-5 flex justify-center gap-2 p-2">
                    <div class="text-xl">
                        How many units do you want? :
                    </div>
                    <div>
                        <form action="{{route('cart.store', $publication->id)}}" method="POST" id="quantityForm">
                            @csrf
                            <select name="quantityUnits" id="buyUnits" class="@error('quantityUnits') border-red-500 @enderror">
                                <option value="{{ old('quantityUnits') }}" selected>{{ old('quantityUnits') ? old('quantityUnits') : 'Choose' }}</option>
                                <option value="1">1</option>
                                <option class="{{$publication->quantity < 2 ? 'hidden' : ''}}" value="2">2</option>
                                <option class="{{$publication->quantity < 3 ? 'hidden' : ''}}" value="3">3</option>
                            </select>

                            @error('quantityUnits')
                                <p class="text-red-500 my-2 text-sm font-bold">{{ $message }}</p>
                            @enderror
                        </form>
                    </div>
                </div>
                <div class="mx-5 flex flex-col sm:flex-row items-center gap-1">
                    <p class="font-bold">Seller: <a class="text-blue-700" href="">{{ucfirst($publication->user->username)}}</p>
                    <img class="rounded-full h-10 w-10" src="{{asset('uploads/profilePhotos').'/'.$publication->user->image}}" alt="user image"></a>
                    <p class="font-bold ml-3">Condition: 
                        <span class="{{$publication->condition == 1 ? "text-green-500" : ($publication->condition == 2 ? "text-blue-500" : "text-amber-500")}}">
                            {{$publication->condition == 1 ? "New" : ($publication->condition == 2 ? "Used" : "Refurbished")}}
                        </span>
                    </p>
                </div>
                <div class="grid grid-cols-1 gap-4 mx-4">
                    <button type="submit" form="quantityForm" class="flex items-center gap-2 justify-center bg-sky-800 hover:bg-sky-900 transition-colors cursor-pointer
                                uppercase font-bold w-full p-3 text-white rounded-lg my-5">
                        add to cart 
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                        </svg>
                    </button>
                </div>
            </div>

            <div>
                <div>
                    <div class="text-2xl font-bold text-center">Payment methods</div>
                </div >
                    
                <div class="grid grid-cols-3 md:grid-cols-6 justify-items-center items-center">
                    <img class="h-12 w-12" src="{{asset('img/paymentMethods/cash.png')}}" alt="payment image 1">
                    <img class="h-16 w-16" src="{{asset('img/paymentMethods/card.png')}}" alt="payment image 2">
                    <img class="h-16 w-16" src="{{asset('img/paymentMethods/visa.png')}}" alt="payment image 3">
                    <img class="h-16 w-16" src="{{asset('img/paymentMethods/mastercard.png')}}" alt="payment image 4">
                    <img class="h-12 w-12" src="{{asset('img/paymentMethods/zelle.png')}}" alt="payment image 5">
                    <img class="h-14 w-14" src="{{asset('img/paymentMethods/bitcoin.png')}}" alt="payment image 6">
                </div>
            </div>

            <div class="flex flex-col items-center my-4 md:flex-row gap-2 md:mx-4">
                <div>
                    <img class="max-h-32 md:max-h-96" src="{{asset('img/safety.png')}}" alt="safety image">
                </div>
                <div>
                    <p class="font-bold text-center md:text-left mr-2 mb-4 md:mb-0">
                       Your purchase is fully protected with us. If you are not satisfied with 
                       your product after a month of use, you can request a refund of your money
                       without any problem.
                    </p>
                </div>
            </div>
        </div>     
    </div>

    <livewire:seller-products :publication="$publication">

    <div class="md:flex md:gap-6 mb-10 md:mx-4 md:justify-around">
        <div class="md:w-1/2 p-5 bg-gray-100 rounded-lg flex flex-col items-center md:shadow-lg mb-20 md:mb-0">
            <div class="p-5 bg-sky-200 rounded-full mt-[-4rem] shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-truck-delivery" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M7 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                <path d="M17 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                <path d="M5 17h-2v-4m-1 -8h11v12m-4 0h6m4 0h2v-6h-8m0 -5h5l3 5" />
                <path d="M3 9l4 0" />
              </svg>
            </div>
            <h3 class="font-bold text-2xl">Delivery</h3>
            <p class="mt-2 text-justify">
                This shipping policy will detail how Awesome components will deliver 
                the products to its customers and the conditions that the process entails. 
                The company has an order transportation agreement with all sellers linked 
                to our website. Awesome components receives the product and takes care of 
                the entire packaging and delivery process. Shipments generally take between
                twenty-four and forty-eight hours to reach their destination if it is a 
                domestic delivery and between one and two weeks if it is an international 
                delivery. Shipping has a cost equivalent to 5% of the value of the product.
                The company is not responsible for the product if the customer requests 
                that it be delivered to an address other than that specified in their personal 
                profile.
            </p>
        </div>

        <div class="md:w-1/2 p-5 bg-gray-100 rounded-lg flex flex-col items-center md:shadow-lg">
            <div class="p-5 bg-sky-200 rounded-full mt-[-4rem] shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-checklist" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M9.615 20h-2.615a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8" />
                    <path d="M14 19l2 2l4 -4" />
                    <path d="M9 8h4" />
                    <path d="M9 12h2" />
                </svg>
            </div>
            <h3 class="font-bold text-2xl">Return policy</h3>
            <p class="mt-2 text-justify">
                You can return any new product you have purchased from Awesome components, if you receive
                it broken or with visible damage. You will receive a full refund within 30 days of purchase. 
                At Awesome components we reserve the right to verify product returns and impose a fee equal 
                to 20% of the sales price on the customer if the customer misunderstands the condition of 
                the product. Any returned item found to be damaged by customer misuse, missing all parts, or
                in unacceptable condition will result in a replacement charge to the customer based on the 
                condition of the product. No returns will be accepted on any product after 30 days of receipt
                of shipment.
            </p>
        </div>
    </div>
@endsection

@section('scripts')
    @vite('resources/js/imagesSelector.js')
    @vite('resources/js/addedToCartAlert.js')
@endsection