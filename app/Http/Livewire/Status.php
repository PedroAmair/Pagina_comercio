<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Publication;

class Status extends Component
{
    public $publication;

    public function changeStatus()
    {
        $publication = Publication::find($this->publication->id);

        if($this->publication->status === 1) {
            $this->publication->status = 0;
        }else{
            $this->publication->status = 1;
        }

        $publication->status = $this->publication->status;
        $publication->save();
    }

    public function render()
    {
        return view('livewire.status');
    }
}
