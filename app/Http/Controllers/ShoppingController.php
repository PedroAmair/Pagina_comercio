<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class ShoppingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $allShops = Payment::with('publications')->where('user_id', auth()->user()->id)->latest()->paginate(10);

        return view('admin.shopping-index', [
            'allShops' => $allShops
        ]);
    }
}
