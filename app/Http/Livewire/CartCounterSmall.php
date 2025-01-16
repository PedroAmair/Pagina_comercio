<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartCounterSmall extends Component
{
    public $cartCountSmall;

    protected $listeners = ['cartUpdated' => 'updateCart'];

    public function mount()
    {
        $this->cartCountSmall = Cart::count();
    }

    public function updateCart()
    {
        $this->cartCountSmall = Cart::count();
    }
    public function render()
    {
        return view('livewire.cart-counter-small');
    }
}
