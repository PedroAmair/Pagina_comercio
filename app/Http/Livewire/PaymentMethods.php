<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PaymentMethods extends Component
{
    public $option;
    
    protected $listeners = ['paymentMethod'];

    public function paymentMethod($option)
    {   
        $this->option = $option;
        $this->emit('payment', $this->option);
    }

    public function render()
    {
        return view('livewire.payment-methods');
    }
}
