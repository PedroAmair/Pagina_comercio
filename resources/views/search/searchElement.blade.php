@extends('layouts.app')

@section('content')
    <div class="md:flex my-4 p-5">
        <div class="w-2/3">
            <img class="mx-auto" src="{{ asset('uploads').'/'.$product->image }}" alt="{{$product->name}}">
        </div>
        <div class="w-1/3 bg-gray-100 rounded-lg">
            <div>
                <h2 class="text-center text-3xl mt-2">{{$product->brand == 'AMD' ? $product->brand.' '.$product->name :  ucfirst(strtolower($product->brand)).' '.$product->name}}</h2>
            </div>

            <div>
                <div class="m-5 text-2xl font-bold">Relevant details</div>
                <div class="flex flex-col-2 gap-14">
                    <div>
                        <ul class="ml-5">
                            @foreach ($product->description as $key=>$value)
                            <li class="list-disc mt-1 ml-5 text-xl">{{$value}}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="flex flex-col justify-top gap-5">
                        <div>
                            <div class="text-xl text-right">There still are:</div>
                            <div class="text-2xl font-bold bg-green-200 rounded-lg text-center p-3">{{$product->quantity}}</div>
                        </div>
                        <div>
                            <div class="text-xl text-center">Price:</div>
                            <div class="text-2xl font-bold text-green-700 text-center">{{$product->price}} $</div>
                        </div>
                    </div>
                </div>
                <div class="my-5 flex gap-2 justify-center">
                    <div class="text-xl">
                        How many units do you want? :
                    </div>
                    <div>
                        <form action="" id="quantityForm">
                            <select name="buyUnits" id="buyUnits">
                                <option value="{{ old('buyUnits') }}" selected>{{ old('buyUnits') ? old('buyUnits') : 'Choose' }}</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                                <option value="4">Four</option>
                                <option value="5">Five</option>
                            </select>
                        </form>
                    </div>
                </div>
                <input 
                    type="submit"
                    value="Purchase"
                    form="quantityForm"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer
                    uppercase font-bold w-full md:w-3/5 p-3 text-white rounded-lg mt-5 ml-5"
                />
            </div>
        </div>
            
    </div>
@endsection