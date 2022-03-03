<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class CardSchool extends Component
{
    public function render()
    {
        $schools = School::all();
        return view('livewire.components.card-school', ['schools'=> $schools]);
    }
}
