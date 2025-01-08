<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Support\Collection;

class ShoppingController extends Controller
{
    public function index()
    {
        $shops = Payment::with('publications')
            ->where('user_id', auth()->user()->id)
            ->has('publications')
            ->latest()
            ->get()
            ->groupBy('reference');

        //$allShops = $shops->unique('reference');
        
        $allShops = (new Collection($shops))->paginate(10);
        
        return view('admin.shopping-index', [
            'allShops' => $allShops
        ]);
    }

}
