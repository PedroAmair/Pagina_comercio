<?php

namespace App\Http\Controllers;

use App\Models\Reputation;

class ReputationController extends Controller
{
    public function index()
    {
        $reputation = Reputation::with(['payments.publications' => function ($query) {
                $query->where('user_id', auth()->user()->id)
                    ->latest();
            }])
            ->where('seller_id', auth()->user()->id)
            ->where('rated', 1)
            ->latest()
            ->paginate(5);

        return view('admin.reputation-index', [
            'reputation' => $reputation,
        ]);
    }
    
}
