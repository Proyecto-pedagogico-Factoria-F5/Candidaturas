<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use App\Models\Promo;

class CardPromo extends Component
{
    public function render()
    {
        $promos = Promo::all();
        $promo_school = School::where('id', $row->escuela_id);
        return view('livewire.components.card-promo', ['promos'=> $promos, 'promo_school' => $promo_school]);
    }
}
