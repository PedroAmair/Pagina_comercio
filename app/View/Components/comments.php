<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class comments extends Component
{
    public $publication;
    public $comments;

    /**
     * Create a new component instance.
     */
    public function __construct($publication, $comments)
    {
        $this->publication = $publication;
        $this->comments = $comments;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.comments');
    }
}
