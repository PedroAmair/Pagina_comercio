<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductsList extends Component
{
    public $discounts;

    public function __construct($discounts)
    {
        $this->discounts = $discounts;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.products-list');
    }
}
