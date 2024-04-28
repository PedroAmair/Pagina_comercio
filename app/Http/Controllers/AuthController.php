<?php

namespace App\Http\Controllers;

use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $user = Socialite::driver($provider)->user();
        
        $user = User::firstOrCreate([
            'email' => $user->getEmail(),
        ], [
            'fname' => $user->getName(),
            'username' => strtok($user->getEmail(),'@'),
            'image' => 'user.png',
        ]);
        
        auth()->login($user);

        return redirect()->route('home');
    }
}
