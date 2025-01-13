@extends('layouts.app')

@section('title')
<div class="my-5">
   Addresses
</div>
@endsection

@section('content')
    @if(count($allDirections))
        <div class="mt-6 mb-16 grid justify-center md:justify-end md:mr-20">
            <x-new-direction-button />
        </div>
       <div class="grid w-11/12 md:w-full gap-10 md:grid-cols-2 mt-5 md:justify-items-center justify-self-center">
            @foreach ($allDirections as $direction)
                <div class="bg-gray-200 p-5 rounded-lg shadow-md md:w-4/5">
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

                    <div class="flex gap-2 justify-end m-2">
                        <livewire:default-button :direction="$direction" /> |
                        <a class="disabled font-bold text-amber-500" href="{{route('directions.edit', [auth()->user()->username, Crypt::encrypt($direction->id)])}}"  @disabled(auth()->user()->id != $direction->user_id)>Edit</a> |
                        <form id="deleteForm{{$direction->id}}" action="{{route('directions.destroy', [auth()->user()->username, $direction])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input id="delete" type="submit" class="disabled font-bold text-red-600 cursor-pointer" value="Delete" @disabled(auth()->user()->id != $direction->user_id)>
                        </form>
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
                <p class="mt-[10%] uppercase text-4xl text-gray-200">Nothing to show here!</p>
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

@section('scripts')
    @vite('resources/js/confirmationDeleteAlert.js')
    @if(session('success'))
        @vite('resources/js/confirmationAlert.js')
    @endif
    @if(session('delete'))
        @vite('resources/js/deleteDone.js')
    @endif
@endsection