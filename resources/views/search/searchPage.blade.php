@extends('layouts.app')

@section('title')
    Search results
@endsection

@section('content')
    @if ($results->count())
        <div class="mt-4 p-5 grid gap-10 md:grid-cols-3 lg:grid-cols-5 align-center">
            @foreach ($results as $result)
                <div class="max-w-52 min-w-10 p-2 hover:shadow-green-200 hover:shadow-xl">
                    <a href="#">
                        <a href="#">
                            <img src="{{asset('uploads').'/'.$result->image}}" alt="{{$result->name}}">
                        </a>
                    </a>
                    <div>
                        <p class="text-center font-bold 2xl:text-2xl">{{$result->name}}</p>
                        <p class="text-center text-green-700 font-bold 2xl:text-2xl">{{$result->price}} $</p>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-5 mx-auto">
            {{$results->links()}}
        </div>
    @else
        <p class="uppercase text-4xl text-gray-200 text-center my-auto">No results for your search</p>
    @endif
@endsection