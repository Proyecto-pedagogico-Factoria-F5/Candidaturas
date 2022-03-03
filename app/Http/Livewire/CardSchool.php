<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\School;

class CardSchool extends Component
{
    /* 
    public $name;
    public $location;

    public function mount($schools)
    {
        $this->name = $schools->name;
        $this->location =  $schools->location;
    }  */
    
    public function render()
    {
        $schools = School::all();
        return view('livewire.card-school',['schools'=> $schools]);
    }
}