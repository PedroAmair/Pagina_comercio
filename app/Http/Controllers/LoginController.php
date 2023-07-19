<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            //'email' => 'required|email',
            'password' => 'required'
        ]);

        if(!auth()->attempt($request->only('username', 'password'))) {
            return back()->with('message', 'Incorrect credentials');
        }

        return redirect()->route('index');
    }
}
