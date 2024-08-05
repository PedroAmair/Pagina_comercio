<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;

class HomeController extends Controller
{
    public function __invoke()
    {
        $processors = Publication::where('category', 'processor')
            ->limit(10)
            ->latest()
            ->get();

        $discounts = Publication::where('price', '<', '200')
            ->limit(15)
            ->orderBy('price', 'asc')
            ->get();

        foreach($processors as $pro) {
            $pro->image = explode(",", $pro->image);
        }

        foreach($discounts as $dis) {
            $dis->image = explode(",", $dis->image);
        }

        return view('home', [
            'processors' => $processors,
            'discounts' => $discounts,
        ]);
    }
}
