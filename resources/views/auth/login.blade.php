@extends('layouts.app')

@section('content')
    <div class="flex flex-col justify-center items-center mt-5">
        <div>
            <img class="w-80" src="{{ asset('img/logo/Logo4.png') }}" alt="login image">
        </div>

        <div class="font-bold text-3xl mb-4">
           Sign in
        </div>

        <div class="border-2 border-gray-300 p-8 rounded-lg w-2/5 mb-5">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="username" id="username" class="mb-2 block uppercase text-gray-500 font-bold">
                        Username
                    </label>
                    <input
                        id="username"
                        name="username"
                        type="text"
                        class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror"
                        value="{{ old('username') }}"
                    />

                    @error('username')
                        <p class="text-red-500 my-2 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" id="password" class="mb-2 block uppercase text-gray-500 font-bold">
                        Password
                    </label>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror"
                    />

                    @error('password')
                        <p class="text-red-500 my-2 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <input type="checkbox" name="remember"><label for="remember" id="remember" class="text-gray-500 font-bold"> Remember me
                </div>

                @if (session('message'))
                    <p class="text-red-500 my-2 text-sm text-center">{{ session('message') }}</p>
                @endif

                <input 
                    type="submit"
                    value="Log in"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer
                    uppercase font-bold w-1/2 p-3 text-white rounded-lg mt-4"
                />
            </form>
        </div>
    </div>
@endsection
