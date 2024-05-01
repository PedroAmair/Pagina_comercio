<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Publication;

class SellerProducts extends Component
{
    public $publication;
 
    public function render()
    {
        $sellerPublications = Publication::select('id', 'product', 'price', 'user_id', 'image')->where([['user_id', $this->publication->user_id],['id', '!=', $this->publication->id],['status', 1]])->limit(4)->latest()->get();

        foreach($sellerPublications as $publication) {
            $publication->image = explode(",", $publication->image);
        }

        return view('livewire.seller-products', [
            'sellerPublications' => $sellerPublications
        ]);
    }
}
