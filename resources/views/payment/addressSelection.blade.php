@extends('layouts.app')

@section('title')
<div class="my-5">
    Address Selection
</div>
@endsection

@section('content')
    @if(count($allDirections))
        <div class="w-4/5 mx-auto text-center">
            <p>
                In this section you can choose one of your registered addresses 
                to receive your purchase in the comfort of your home. Please 
                note that the address you choose here <span class="font-bold">will not modify your default 
                address</span>; it will only be the address chosen for this 
                <span class="font-bold">particular shipment</span>.
            </p>
        </div>
        <div class="grid w-11/12 md:w-full gap-10 md:grid-cols-2 mt-10 md:justify-items-center justify-self-center">
            @foreach ($allDirections as $direction)
                <div class="bg-gray-200 p-5 rounded-lg shadow-md md:w-4/5">
                    <livewire:address-selection :direction="$direction">
                    <h3 class="text-center font-bold text-xl mb-2 flex gap-2 items-center justify-center">
                        <span class="{{$direction->is_default == 1 ? : 'hidden'}} bg-sky-600 p-1 rounded-lg shadow-lg text-white">
                            Default 
                        </span>
                        Shipping address
                        <div class="w-8 h-8">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                            </svg> 
                        </div> 
                    </h3>
                    <div class="flex gap-1">
                        <p>Nombre: <span class="font-bold">{{$direction->user->fname}}</span></p>
                        <p><span class="font-bold">{{$direction->user->lname}}</span></p>
                    </div>

                    <div>
                        <p>Dirección: <span class="font-bold">{{$direction->direction_line_1.". ".$direction->direction_line_2}}.</span></p>
                    </div>

                    <div>
                        <p>País: <span class="font-bold">{{$direction->country}}</span></p>
                        <p>Estado: <span class="font-bold">{{$direction->state}}</span></p>
                        <p>Ciudad: <span class="font-bold">{{$direction->city}}</span></p>
                    </div>

                    <div>
                        <p>Zip code: <span class="font-bold">{{$direction->zip_code}}</span></p>
                    </div>
                    
                </div>
            @endforeach
        </div> 
        <div class="m-5">
            {{$allDirections->links()}}
        </div>
    @else
        <div class="flex flex-col items-center">
            <div>
                <p class="mt-[10%] text-2xl text-black">
                    There are no registered addresses. You must have at least one shipping address to complete your purchase.
                </p>
            </div>
            <div class="flex gap-2">
                <p class="text-2xl">Add your first address</p>
                <a href="{{route('directions.create', auth()->user()->username)}}" class="text-2xl underline text-blue-600">
                    Now!
                </a>
            </div>
        </div>
    @endif
@endsection