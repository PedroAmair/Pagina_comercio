<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowPaymentMethod extends Component
{
    public $selected;
    protected $listeners = ['payment' => 'paymentType'];

    public function paymentType($option)
    {
        $this->selected = $option;
    }

    public function render()
    {
        return view('livewire.show-payment-method');
    }
}
