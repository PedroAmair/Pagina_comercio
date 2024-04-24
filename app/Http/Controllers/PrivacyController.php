<?php

namespace App\Http\Controllers;

class PrivacyController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        return view('legal.privacy');
    }
}
