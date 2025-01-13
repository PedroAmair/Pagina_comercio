@extends('layouts.app')

@section('title')
<div class="pt-3 font-bold">
    Add direction
</div>
@endsection

@section('content')
    <div class="m-5 rounded-lg flex items-center justify-center bg-white">
        <form action="{{route('directions.store', auth()->user()->username)}}" method="POST" class="mt-2 xl:w-2/5 xl:pr-5 xl:pb-4">
            @csrf
            <fieldset class="p-5 border-4 border-gray-200 rounded-lg">
                <legend class="font-bold">Direction information</legend>
                <div class="mb-3">
                    <label for="direction_line_1" id="direction_line_1" class="mb-2 block uppercase text-gray-500 font-bold">
                        First direction line
                    </label>
                    <input
                        id="direction_line_1"
                        name="direction_line_1"
                        type="text"
                        placeholder="Street, avenue, carrera"
                        class="border p-3 w-full rounded-lg @error('direction_line_1') border-red-500 @enderror"
                        value="{{ old('direction_line_1') }}"
                    />

                    @error('direction_line_1')
                        <p class="text-red-500 my-2 text-sm font-bold">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="direction_line_2" id="direction_line_2" class="mb-2 block uppercase text-gray-500 font-bold">
                        Second direction line
                    </label>
                    <input
                        id="direction_line_2"
                        name="direction_line_2"
                        type="text"
                        placeholder="Urbanization, residence, house number"
                        class="border p-3 w-full rounded-lg @error('direction_line_2') border-red-500 @enderror"
                        value="{{ old('direction_line_2') }}"
                    />

                    @error('direction_line_2')
                        <p class="text-red-500 my-2 text-sm font-bold">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <livewire:location-component/>
                </div>

                <div class="mb-3">
                    <label for="zip_code" id="zip_code" class="mb-2 block uppercase text-gray-500 font-bold">
                        Zip code
                    </label>
                    <input
                        id="zip_code"
                        name="zip_code"
                        type="text"
                        class="border p-3 w-full rounded-lg @error('zip_code') border-red-500 @enderror"
                        value="{{ old('zip_code') }}"
                    />

                    @error('zip_code')
                        <p class="text-red-500 my-2 text-sm font-bold">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3 mt-5">
                    <input type="hidden" name="is_default" value="0">
                    <label for="is_default">
                        <input 
                            type="checkbox" 
                            id="is_default"
                            name="is_default"
                            class="@error('zip_code') border-red-500 @enderror"
                            value="1"
                        >
                            Es predeterminada
                    </label>
                </div>
                
                <input 
                    type="submit"
                    value="Proceed"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer
                    uppercase font-bold w-full 2xl:w-2/4 p-3 text-white rounded-lg mt-4"
                />
            </fieldset>  
        </form>
    </div>
@endsection
