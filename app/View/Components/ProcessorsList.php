<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProcessorsList extends Component
{
    public $processors;

    public function __construct($processors)
    {
        $this->processors = $processors;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.processors-list');
    }
}
