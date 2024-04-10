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
                <div class="my-5 flex justify-center gap-2 md:gap-0 p-2">
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
@endsection

@section('scripts')
    @vite('resources/js/imagesSelector.js')
@endsection