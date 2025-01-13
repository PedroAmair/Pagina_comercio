<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddressSelection extends Component
{
    public $direction;

    public function getAddress()
    {
       return redirect()->route('payment.confirmation', $this->direction);
    }

    public function render()
    {
        return view('livewire.address-selection');
    }
}
