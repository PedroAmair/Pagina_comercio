<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Support\Collection;

class ShoppingController extends Controller
{
    public $counter = 0;

    public function index()
    {
        
        $shops = Payment::with('publications', 'reputation')
            ->where('user_id', auth()->user()->id)
            ->has('publications')
            ->has('reputation')
            ->latest()
            ->get()
            ->groupBy('reference');

        //$allShops = $shops->unique('reference');
        
        $allShops = (new Collection($shops))->paginate(10);
        $allTrue = true;
        
        return view('admin.shopping-index', [
            'allShops' => $allShops,
            'allTrue' => $allTrue,
            'counter' => $this->counter
        ]);
    }

}
