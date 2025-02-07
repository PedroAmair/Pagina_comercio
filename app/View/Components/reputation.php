<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class reputation extends Component
{
    public $publication;
    public $avgReputation;
    /**
     * Create a new component instance.
     */
    public function __construct($publication, $avgReputation)
    {
        $this->publication = $publication;
        $this->avgReputation = $avgReputation;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.reputation');
    }
}
