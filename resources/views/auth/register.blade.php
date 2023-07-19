@extends('layouts.app')

@section('content')
    <div class="flex flex-col justify-center items-center mt-10">
        <div>
            <img class="w-80" src="{{ asset('img/logo/logo4.png') }}" alt="register image">
        </div>

        <div class="font-bold text-3xl mb-4">
           Sign up
        </div>

        <div class="bg-gray-100 shadow p-8 rounded-lg w-3.2/12">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" id="name" class="mb-2" block uppercase text-gray-500 font-bold>
                        Full name
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
                    <label for="username" id="username" class="mb-2" block uppercase text-gray-500 font-bold>
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
                    <label for="email" id="email" class="mb-2" block uppercase text-gray-500 font-bold>
                        Email
                    </label>
                    <input
                        id="email"
                        name="email"
                        type="email"
                        class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror"
                        value="{{ old('email') }}"
                    />

                    @error('email')
                        <p class="text-red-500 my-2 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" id="password" class="mb-2" block uppercase text-gray-500 font-bold>
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

                <div class="mb-3">
                    <label for="password_confirmation" id="password" class="mb-2" block uppercase text-gray-500 font-bold>
                        Repeat password
                    </label>
                    <input
                        id="password_confirmation"
                        name="password_confirmation"
                        type="password"
                        class="border p-3 w-full rounded-lg @error('password_confirmation') border-red-500 @enderror"
                    />
                </div>

                <input 
                    type="submit"
                    value="Create account"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer
                    uppercase font-bold w-full p-3 text-white rounded-lg mt-4"
                />
            </form>
        </div>
    </div>
@endsection
