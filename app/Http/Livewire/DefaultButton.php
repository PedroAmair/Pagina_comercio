<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Direction;

class DefaultButton extends Component
{
    public $direction;

    public function changeDefault()
    {
        Direction::query()
            ->where([
                'is_default' => 1,
                'user_id' => $this->direction->user_id
            ])
            ->where('id', '<>', $this->direction->id)
            ->update(['is_default' => 0]);

        $direction = Direction::find($this->direction->id);

        if($this->direction->is_default == 1) {
            $this->direction->is_default = 0;
        }else{
            $this->direction->is_default = 1;
        }

        $direction->is_default = $this->direction->is_default;
        $direction->save();

        return redirect()->route('directions.index', auth()->user()->id);
    }

    public function render()
    {
        return view('livewire.default-button');
    }
}
