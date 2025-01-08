@extends('layouts.app')

@section('title')
<div class="my-5">
   Publications
</div>
@endsection

@section('content')
    @if(count($publications))
        <div class="my-5 grid justify-center md:justify-end md:mr-6">
            <x-sell-button />
        </div>
        <div class="grid grid-cols-1 p-5 gap-4">
            <div>
                <p class="text-center md:text-left font-bold text-xl">Publications total: {{auth()->user()->publications->count()}}</p>
            </div>
            @foreach ($publications as $publication)
                <div class="border-gray-200 border-4 rounded-lg">
                    <div class="flex flex-col md:flex-row items-center">
                        <div class="bg-white w-1/2 md:w-2/12">
                            <img class="p-1" src="{{asset('uploads').'/'.$publication->image[0]}}" alt="product image">
                        </div>
                        <div class="grid grid-cols-1 items-center justify-start md:w-2/3">
                            <div>
                                <h2 class="text-xl font-bold text-center md:text-left ml-3">
                                    {{$publication->brand === 'amd' || $publication->brand === 'evga' || $publication->brand === 'msi' || $publication->brand === 'xfx' ? strtoupper($publication->brand).' '.$publication->product :  ucwords($publication->brand).' '.$publication->product}}
                                </h2>
                                <div class="flex flex-col items-center md:items-start">
                                    <p class="ml-3 text-lg">Condition: <span class="font-bold">{{$publication->condition == 1 ? "New" : ($publication->condition == 2 ? "Used" : "Refurbished")}}</span></p>
                                    <p class="ml-3 text-lg">Quantity: <span class="font-bold">{{$publication->quantity}} @choice('unit|units', $publication->quantity)</span></p>
                                    <p class="ml-3 text-lg">Category: <span class="font-bold">{{$publication->category === 'ssd' ? strtoupper($publication->category) : ucwords($publication->category)}}</span></p>
                                    <p class="ml-3 text-lg">Price: <span class="font-bold text-green-700">{{$publication->price}} $</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="md:w-2/6 xl:w-3/6 md:mx-2 my-4 md:my-0 md:mt-2">
                            <livewire:status :publication="$publication" />
                        </div>
                        <div class="flex flex-col md:flex-row gap-2 w-2/6 xl:w-1/6 3xl:w-1/12 my-2 md:my-0 mx-0 md:mx-2">
                            <a class="disabled py-2 px-6 font-bold bg-amber-400 text-white rounded-lg hover:bg-amber-500 text-center" href="{{route('publications.edit', [auth()->user()->username, Crypt::encrypt($publication->id)])}}" @disabled(auth()->user()->username != $publication->user->username)>Edit</a>
                            <form id="deleteForm{{$publication->id}}" action="{{route('publications.destroy', [auth()->user()->username, $publication])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input id="delete" type="submit" class="disabled w-full py-2 px-4 font-bold bg-red-600 text-white rounded-lg hover:bg-red-700 cursor-pointer" value="Delete" @disabled(auth()->user()->username != $publication->user->username)>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="my-5">
                {{$publications->links()}}
            </div>
        </div>
    @else
        <div class="flex flex-col items-center">
            <div>
                <p class="mt-[10%] uppercase text-4xl text-gray-200">Nothing to show here!</p>
            </div>
            <div class="flex gap-2">
                <p class="text-2xl">Publicate your first product</p>
                <a href="{{route('publications.create', auth()->user()->username)}}" class="text-2xl underline text-blue-600">
                    Now!
                </a>
            </div>
        </div>
    @endif
@endsection

@section('scripts')
    @vite('resources/js/publicationOptions.js')
    @if(session('success'))
        @vite('resources/js/confirmationAlert.js')
    @endif
    @vite('resources/js/confirmationDeleteAlert.js')
    @if(session('delete'))
        @vite('resources/js/deleteDone.js')
    @endif
@endsection