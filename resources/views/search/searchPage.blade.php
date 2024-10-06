@extends('layouts.app')

@section('title')
<div class="my-5">
    Search results
</div>
@endsection

@section('content')
    @if ($results->count())
        <div class="mt-4 p-5 grid gap-10 md:grid-cols-3 lg:grid-cols-5 align-center">
            @foreach ($results as $result)
                <div class="hover:shadow-xl hover:shadow-sky-200 max-w-52 min-w-10">
                    <a href="{{route('searchs.show', $result)}}">
                        <img class="mx-auto h-1/2" src="{{asset('uploads').'/'.$result->image[0]}}" alt="{{$result->product}}">
                    </a>

                    <div>
                        <p class="truncate text-center font-bold 2xl:text-xl">{{$result->brand === 'amd' || $result->brand === 'evga' || $result->brand === 'msi' || $result->brand === 'xfx' ? strtoupper($result->brand).' '.$result->product :  ucwords($result->brand).' '.$result->product}}</p>
                        <p class="text-center text-green-700 font-bold text-2xl">{{$result->price}} $</p>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="my-5 sm:mx-5 md:mx-9 lg:mx-5 xl:mx-9">
            {{$results->links()}}
        </div>
    @else
        <p class="mt-[5%] uppercase text-4xl text-gray-200 text-center m-auto">No results for your search</p>
    @endif
@endsection