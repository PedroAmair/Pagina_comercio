@extends('layouts.app')

@section('content')
    <div class="md:flex mt-4 p-5">
        <div class="w-2/3">
            <img class="mx-auto" src="{{ asset('uploads').'/'.$product->image }}" alt="{{$product->name}}">
        </div>
        <div class="w-1/3 bg-gray-100 rounded-lg">
            <div>
                <h2 class="text-center text-3xl mt-2">{{$product->brand.' '.$product->name}}</h2>
            </div>
            <div>
                
            </div>
        </div>
            
    </div>
@endsection