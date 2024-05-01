@extends('layouts.app')

@section('title')
<div class="my-5">
    Products sold by {{ucfirst($username)}}
</div>
@endsection

@section('content')
    @if ($allPublications->count())
        <div class="mt-4 p-5 grid gap-10 md:grid-cols-3 lg:grid-cols-5 align-center">
            @foreach ($allPublications as $publication)
                <div class="hover:shadow-xl hover:shadow-sky-200 max-w-52 min-w-10">
                    <a href="{{route('searchs.show', $publication)}}">
                        <img class="mx-auto h-1/2" src="{{asset('uploads').'/'.$publication->image[0]}}" alt="{{$publication->product}}">
                    </a>

                    <div>
                        <p class="text-center font-bold 2xl:text-xl">{{$publication->brand === 'amd' || $publication->brand === 'evga' || $publication->brand === 'msi' || $publication->brand === 'xfx' ? strtoupper($publication->brand).' '.$publication->product :  ucwords($publication->brand).' '.$publication->product}}</p>
                        <p class="text-center text-green-700 font-bold text-2xl">{{$publication->price}} $</p>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-5 mx-auto">
            {{$allPublications->links()}}
        </div>
    @else
        <p class="mt-[5%] uppercase text-4xl text-gray-200 text-center m-auto">Nothing to show here</p>
    @endif
@endsection