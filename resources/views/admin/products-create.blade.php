@extends('layouts.admin')

@section('title')
    <h2 class="my-4 text-2xl font-bold text-center">Register product</h2>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('content')
    <div class="m-5 rounded-lg md:flex gap-2 items-center bg-sky-100">
        <div class="flex flex-col items-center md:w-1/3 md:pl-5">
            <p class="font-bold my-2 md:mb-3">Hardware image</p>
            <form action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data" id="dropzone" class="dropzone border-dashed border-2 w-5/6 md:w-full h-96 rounded flex flex-col justify-center items-center">
                @csrf
            </form>
        </div>

        <form action="{{ route('products.store') }}" method="POST" class="mt-2 md:w-2/3 md:pr-5 md:pb-4">
            @csrf
            <fieldset class="p-5 border-4 border-gray-300 rounded-lg md:grid md:grid-cols-3 md:gap-5">
                <legend class="font-bold">Hardware information</legend>
                <div class="mb-3 col-span-2">
                    <label for="name" id="name" class="mb-2" block uppercase text-gray-500 font-bold>
                        Name
                    </label>
                    <input
                        id="name"
                        name="name"
                        type="text"
                        class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                        value="{{ old('name') }}"
                    />
    
                    @error('name')
                        <p class="text-red-500 my-2 text-sm">{{ $message }}</p>
                    @enderror
                </div>
    
                <div class="mb-3">
                    <label for="brand" id="brand" class="mb-2" block uppercase text-gray-500 font-bold>
                        Brand
                    </label>
                    <input
                        id="brand"
                        name="brand"
                        type="text"
                        class="border p-3 w-full rounded-lg @error('brand') border-red-500 @enderror"
                        value="{{ old('brand') }}"
                    />
    
                    @error('brand')
                        <p class="text-red-500 my-2 text-sm">{{ $message }}</p>
                    @enderror
                </div>
    
                <div class="mb-3">
                    <label for="category" id="category" class="mb-2" block uppercase text-gray-500 font-bold>
                        Category
                    </label>
                    <select name="category" id="category" class="border p-3 w-full rounded-lg @error('brand') border-red-500 @enderror">
                        <option value="{{ old('category') }}" selected>{{ old('category') ? old('category') : 'Select your choice' }}</option>
                        <option value="motherboard">Motherboard</option>
                        <option value="processor">Processor</option>
                        <option value="graphic card">Graphic card</option>
                        <option value="ssd">Solid units state</option>
                        <option value="cases">PC Cases</option>
                        <option value="ram memory">Ram memory</option>
                    </select>
    
                    @error('category')
                        <p class="text-red-500 my-2 text-sm">{{ $message }}</p>
                    @enderror
                </div>
    
                <div class="mb-3">
                    <label for="quantity" id="quantity" class="mb-2" block uppercase text-gray-500 font-bold>
                        Quantity
                    </label>
                    <input
                        id="quantity"
                        name="quantity"
                        type="number"
                        class="border p-3 w-full rounded-lg @error('quantity') border-red-500 @enderror"
                        value="{{ old('quantity') }}"
                    />
    
                    @error('quantity')
                        <p class="text-red-500 my-2 text-sm">{{ $message }}</p>
                    @enderror
                </div>
    
                <div class="mb-3">
                    <label for="price" id="price" class="mb-2" block uppercase text-gray-500 font-bold>
                        Price
                    </label>
                    <input
                        id="price"
                        name="price"
                        type="text"
                        class="border p-3 w-full rounded-lg @error('price') border-red-500 @enderror"
                        value="{{ old('price') }}"
                    />
    
                    @error('price')
                        <p class="text-red-500 my-2 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <input
                        name="image"
                        type="hidden"
                        value="{{ old('image') }}"
                    />

                    @error('image')
                        <p class="text-red-500 my-2 text-sm"><--{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3 col-start-2 col-span-2">
                    <label for="description" id="description" class="mb-2" block uppercase text-gray-500 font-bold>
                        Description
                    </label>
                    <textarea
                        name="description"
                        rows="6"
                        class="border p-3 w-full rounded-lg @error('price') border-red-500 @enderror">
                            {{ old('description') }}
                    </textarea>
    
                    @error('description')
                        <p class="text-red-500 my-2 text-sm">{{ $message }}</p>
                    @enderror
                </div>
    
                <input 
                    type="submit"
                    value="Proceed"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer
                    uppercase font-bold w-full md:w-2/3 p-3 text-white rounded-lg mt-4 col-start-1 col-end-1"
                />
            </fieldset>  
        </form>
    </div>
@endsection