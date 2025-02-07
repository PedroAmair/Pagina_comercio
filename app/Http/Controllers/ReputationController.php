<?php

namespace App\Http\Controllers;

use App\Models\Reputation;

class ReputationController extends Controller
{
    public function index()
    {
        $reputation = Reputation::where('seller_id', auth()->user()->id)
            ->where('rated', 1)
            ->latest()
            ->get();

        return view('admin.reputation-index', [
            'reputation' => $reputation,
        ]);
    }
    
}
