<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ItemsList extends Component
{
    public $brand;
   
    protected $listeners = ['dataCapture' => 'listBrands'];

    public function listBrands()
    {
       
    }

    public function render()
    {
        return view('livewire.items-list');
    }
}
