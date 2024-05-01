@extends('layouts.app')

@section('content')
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
                        <form action="" id="quantityForm">
                            <select name="buyUnits" id="buyUnits">
                                <option value="{{ old('buyUnits') }}" selected>{{ old('buyUnits') ? old('buyUnits') : 'Choose' }}</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
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
                <div class="flex gap-2 mx-5">
                    <input 
                        type="submit"
                        value="Purchase now"
                        form="quantityForm"
                        class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer
                        uppercase font-bold w-4/5 p-3 text-white rounded-lg my-5"
                    />
                    <button class="bg-sky-800 hover:bg-sky-900 transition-colors cursor-pointer
                                    uppercase font-bold w-4/5 p-3 text-white rounded-lg my-5">
                        add to cart
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
@endsection