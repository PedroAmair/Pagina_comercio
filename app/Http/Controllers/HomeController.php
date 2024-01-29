<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;

class HomeController extends Controller
{
    public function __invoke()
    {
        $processors = Product::where('category', 'processor')->limit(20)->latest()->get();
        $discounts = Product::where('price', '<', '200')->limit(20)->latest()->get();

        return view('home', [
            'processors' => $processors,
            'discounts' => $discounts,
        ]);
    }
}
