<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartCounter extends Component
{
    public $cartCount;

    protected $listeners = ['cartUpdated' => 'updateCart'];

    public function mount()
    {
        $this->cartCount = Cart::count();
    }

    public function updateCart()
    {
        $this->cartCount = Cart::count();
        $this->emit('updated');
    }

    public function render()
    {
        return view('livewire.cart-counter');
    }
}
