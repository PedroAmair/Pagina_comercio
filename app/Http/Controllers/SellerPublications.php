<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Support\Facades\Crypt;

class SellerPublications extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($username, $user_id)
    {
        $user_id = Crypt::decrypt($user_id);
        $allPublications = Publication::select('id', 'product', 'price', 'user_id', 'image')
            ->where([['user_id', $user_id], ['status', 1]])
            ->latest()
            ->paginate(20);
        
        foreach($allPublications as $publication) {
            $publication->image = explode(",", $publication->image);
        }

        return view('customerView.seller-publications', [
            'allPublications' => $allPublications,
            'username' => $username
        ]);

    }
}
