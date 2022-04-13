<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use App\Models\Promo;
use App\Models\School;

class CardPromo extends Component
{
    public $idSchool;

    public function render()
    {

        if($this->idSchool){
            $school = School::find($this->idSchool);
            $promos = $school->promo()->get();
        }else{
            $promos = Promo::all();
        }

        return view('livewire.components.card-promo', ['promos'=> $promos]);
        
    }
}
