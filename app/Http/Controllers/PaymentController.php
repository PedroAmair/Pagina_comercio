<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('payment.index');
    }

    public function paypal()
    {
        dd('hola mundo');
    }

    public function success()
    {

    }

    public function cancel()
    {

    }
}
