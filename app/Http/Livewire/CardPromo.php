<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CardPromo extends Component
{
    public function render()
    {
        $promos = Promo::all();
        return view('livewire.card-promo', ['promos'=> $promos]);
    }
}
