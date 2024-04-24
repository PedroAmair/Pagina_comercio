@extends('layouts.app')

@section('content')
    <div class="mx-4 sm:max-w-screen-xl sm:mx-auto mb-4">
        <h2 class="text-3xl font-bold m-4 text-center">Instructions for data deletion</h2>

        <p class="text-lg text-justify">
            In accordance with Facebook's rules for Apps and Websites, we must provide
            our app users with instructions to delete their user data. If you want to
            delete your activity related to Awesome components App, you can do so by 
            following these steps:
        </p>
        <div class="my-10">
            <p class="text-xl font-bold uppercase">First step</p>
            <p class="text-lg text-justify">
                Log in to your Facebook account and click on “Settings and privacy”. 
                Then click on “Settings”.
            </p>
        </div>

        <div class="my-10">
            <p class="text-xl font-bold uppercase">Second step</p>
            <p class="text-lg text-justify">
                Go to the “Apps and websites” section, where you can see all 
                your activity related to applications and web pages registered 
                in your Facebook account.
            </p>
            <img class="my-3" src="{{asset('img/facebookImages/image1.webp')}}" alt="first image">
        </div>

        <div class="my-10">
            <p class="text-xl font-bold uppercase">Third step</p>
            <p class="text-lg text-justify">
                Select the box to the right of the Awesome components App and click “Remove”.
            </p>
            <img class="my-3" src="{{asset('img/facebookImages/image2.webp')}}" alt="first image">
        </div>

        <div class="my-10">
            <p class="text-xl font-bold uppercase">Fourth step</p>
            <p class="text-lg text-justify">
                Check or uncheck the boxes according to your preferences and click “Remove”.
            </p>
            <img class="my-3" src="{{asset('img/facebookImages/image3.webp')}}" alt="first image">
        </div>
    </div>
@endsection