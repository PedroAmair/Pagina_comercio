<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Reputation;

class RatingModule extends Component
{
    public $value;
    public $actualKey;
    public $nonRatedCounter = null;
    public $comments = null;
    public $calification = null;

    protected $rules = [
        'calification' => 'required',
        'comments' => 'required|max:140|min:10'
    ];

    public function mount()
    {
        $this->nonRatedCounter = Reputation::where([['payment_id', $this->value[0]->id], ['rated', 0]])->count();
    }

    public function qualify($key)
    {
        $this->validate();

       $newRating = Reputation::find($key);
       
       if($newRating) {
            $newRating->calification = $this->calification;
            $newRating->comments = $this->comments;
            $newRating->rated = 1;
    
            $newRating->save();
    
            return redirect()->route('shopping.index', auth()->user()->username)->with('success', 'success');
        }
       
    }

    public function render()
    {
        return view('livewire.rating-module');
    }
}
