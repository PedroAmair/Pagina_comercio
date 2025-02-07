<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class AddCartButton extends Component
{
    public $publication;
    public $quantityUnits;

    protected $rules = [
        'quantityUnits' => 'required'
    ];

    public function addToCart()
    {
        if($this->publication->user->id === auth()->user()->id) {
            $this->emit('error');
            session()->flash('error', 'You cannot buy your own product');
            return redirect()->back();
        }

        $this->validate();

        $this->publication->image = explode(",", $this->publication->image);
        $publicationBrandAndProoduct = $this->publication->brand.' '.$this->publication->product;

        Cart::add(
            $this->publication->id,
            $publicationBrandAndProoduct,
            $this->quantityUnits,
            $this->publication->price,
            ["image" => $this->publication->image]
        );

        $this->emit('cartUpdated');
        $this->emit('addedProduct');
        session()->flash('success', $this->publication->product.' added to cart');
        return redirect()->back();

    }

    public function render()
    {
        return view('livewire.add-cart-button');
    }
}
