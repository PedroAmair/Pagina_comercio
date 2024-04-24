<?php

namespace App\Http\Controllers;

class DataDeletionController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        return view('legal.dataDeletionFacebook');
    }
}
