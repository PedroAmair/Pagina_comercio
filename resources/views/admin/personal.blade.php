@extends('layouts.app')

@section('title')
    <div class="my-5 flex items-center justify-center gap-1">
        My space <img class="w-8 h-8 rounded-full" src="{{asset('uploads/profilePhotos').'/'.$user->image}}" alt="user image" alt="user image">
    </div>
@endsection

@section('content')
    <div class="flex flex-col-reverse items-center md:flex-row-reverse md:items-start gap-3 md:gap-2">
        <div class=" flex items-center justify-center w-1/3 md:w-3/12 xl:w-2/12 mt-2">
            <x-sell-button />
        </div>
        <div class="w-8/12">
            <p class="text-lg text-center">
                Hello <span class="font-bold">{{ucfirst($user->username)}}</span>.
                Welcome to your personal spot where you can change your 
                profile, see the products you buy and sell, change your 
                payment methods and basically have a detailed info of 
                all your activities on this website.
            </p>
        </div>
    </div>

    <div class="flex flex-col md:flex-row items-center gap-5 m-5">
        <div class="w-full md:w-6/12">
            <h2 class="text-2xl font-bold text-center lg:text-left">My info</h2>
            <div id="buttons" class="border-2 border-solid border-gray-200 flex flex-col 2xl:flex-row justify-center items-center py-2 2xl:py-0">
                <button id="button" data-activeDiv="1" class="p-5 font-bold bg-gray-200 hover:bg-gray-300 rounded-full w-2/3 lg:w-2/4 2xl:w-full my-2 2xl:my-5 2xl:mx-2">Change profile</button>
                <button id="button" data-activeDiv="2" class="p-5 font-bold bg-gray-200 hover:bg-gray-300 rounded-full w-2/3 lg:w-2/4 2xl:w-full my-2 2xl:my-5 2xl:mx-2">Payment methods</button>
                <button id="button" data-activeDiv="3" class="p-5 font-bold bg-gray-200 hover:bg-gray-300 rounded-full w-2/3 lg:w-2/4 2xl:w-full my-2 2xl:my-5 2xl:mx-2">Facturation address</address></button>
            </div>
        </div>

        <div class="w-full md:w-6/12">
            <h2 class="text-2xl font-bold text-center lg:text-left">My transactions</h2>
            <div class="border-2 border-solid border-gray-200 flex flex-col 2xl:flex-row justify-center items-center py-2 2xl:py-0">
                <a href="{{route('shopping.index')}}" class="p-5 font-bold bg-gray-200 hover:bg-gray-300 rounded-full w-2/3 lg:w-2/4 2xl:w-full my-2 2xl:my-5 2xl:mx-2 text-center">My shopping</a>
                <a href="{{route('publications.index')}}" class="p-5 font-bold bg-gray-200 hover:bg-gray-300 rounded-full w-2/3 lg:w-2/4 2xl:w-full my-2 2xl:my-5 2xl:mx-2 text-center">My publications</a>
                <a href="{{route('selled.index')}}" class="p-5 font-bold bg-gray-200 hover:bg-gray-300 rounded-full w-2/3 lg:w-2/4 2xl:w-full my-2 2xl:my-5 2xl:mx-2 text-center">My sells</a>
            </div>
        </div>

    </div>

    <div id="activeDiv1" class="hidden">

        <div class="my-5 font-bold text-2xl text-center">
            Your profile
        </div>
            
        <div class="m-5 bg-white lg:flex items-start">
            <div class="flex flex-col items-center mt-2">
                <p class="font-bold mb-1">Avatar</p>
                <img class="w-2/4 rounded-full" src="{{asset('uploads/profilePhotos').'/'.$user->image}}" alt="user image">
            </div>
    
            <form action="{{ route('personal.update', auth()->user()->username) }}" method="POST" enctype="multipart/form-data" class="mt-2 lg:w-2/3 lg:pr-5 lg:pb-4">
                @csrf
                @method('PATCH')
                <fieldset class="p-5 border-4 border-gray-200 rounded-lg grid md:grid-cols-2 gap-2">
                    <legend class="font-bold">Personal information</legend>
                    <div class="mb-3">
                        <label for="username" id="username" class="mb-2 block uppercase text-gray-500 font-bold">
                            Username
                        </label>
                        <input
                            id="username"
                            name="username"
                            type="text"
                            class="border w-full rounded-lg @error('username') border-red-500 @enderror"
                            value="{{auth()->user()->username}}"
                        />
        
                        @error('username')
                            <p class="text-red-500 my-2 text-sm font-bold">{{ $message }}</p>
                        @enderror

                    </div>
        
                    <div class="mb-3">
                        <label for="image" id="image" class="mb-2 block uppercase text-gray-500 font-bold">
                            Profile image
                        </label>
                        <input
                            id="image"
                            name="image"
                            type="file"
                            accept=".jpg, .jpeg, .png"
                            value=""
                            class="border w-full rounded-lg bg-gray-100"
                        />
                    </div>

                    <div class="mb-3 {{$user->password ? '' : 'hidden'}}">
                        <input type="checkbox" name="changePassword" id="changePassword" @checked(session('message'))><label for="changePassword" id="changePassword" class="text-gray-500 font-bold uppercase"> Change password
                    </div>

                    <div class="mb-3 col-start-1 hidden" id="changePasswordSection">
                        <label for="password" id="password" class="mb-2 block uppercase text-gray-500 font-bold">
                             Actual password
                        </label>
                        <input
                            id="password"
                            name="password"
                            type="password"
                            class="border p-3 w-full rounded-lg"
                        />
    
                        @if (session('message'))
                            <p class="text-red-500 my-2 text-sm text-center">{{ session('message') }}</p>
                        @endif
                    </div>

                    <div class="mb-3 hidden" id="changePasswordSection">
                        <label for="newPassword" id="newPassword" class="mb-2 block uppercase text-gray-500 font-bold">
                             New password
                        </label>
                        <input
                            id="newPassword"
                            name="newPassword"
                            type="password"
                            class="border p-3 w-full rounded-lg @error('newPassword') border-red-500 @enderror"
                        />
    
                        @error('newPassword')
                            <p class="text-red-500 my-2 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
    
                    <div class="mb-3 hidden" id="changePasswordSection">
                        <label for="newPassword_confirmation" id="newPassword_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">
                            Repeat password
                        </label>
                        <input
                            id="newPassword_confirmation"
                            name="newPassword_confirmation"
                            type="password"
                            class="border p-3 w-full rounded-lg @error('password_confirmation') border-red-500 @enderror"
                        />
                        
                    </div>
        
                    <input 
                        type="submit"
                        value="Proceed"
                        class="inhabilitate bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer
                        uppercase font-bold w-1/3 p-3 text-white rounded-lg mt-4 col-start-1 col-end-1"
                        @disabled(auth()->user()->username != $user->username)
                    />
                </fieldset>  
            </form>
        </div>
    </div>

    <div id="activeDiv2" class="hidden">
        
    </div>
       
@endsection

@section('scripts')
    @vite('resources/js/personalButtons.js')
    @if(session('success'))
        @vite('resources/js/confirmationAlert.js')
    @endif
@endsection