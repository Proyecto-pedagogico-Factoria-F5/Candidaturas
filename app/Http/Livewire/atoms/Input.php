<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Input extends Component
{
    public $type;
    public $label;
    public $input_class;

    public function __constructor($type, $label, $input_class)
    {
        $this->type = $type;
        $this->label = $label;
        $this->input_class = $input_class;
    }

    public function render()
    {
        return view('livewire.atoms.input');
    }
}
