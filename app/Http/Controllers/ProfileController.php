<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;

class ProfileController extends Controller
{
    public function index(User $user) 
    {
        return view('auth.profile', [
            'user' => $user
        ]);
    }
}
