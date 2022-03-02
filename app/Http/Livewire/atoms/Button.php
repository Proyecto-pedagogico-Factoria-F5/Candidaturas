<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Button extends Component
{
    public $btn_class;
    public $btn_name;

    public function __constructor($btn_class, $btn_name)
    {  
        $this->btn_class = $btn_class;
        $this->btn_name = $btn_name;
    }

    public function render()
    {
        return view('livewire.atoms.button');
    }
}
