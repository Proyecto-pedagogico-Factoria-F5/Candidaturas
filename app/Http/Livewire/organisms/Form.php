<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Form extends Component
{
    // TITLE
    public $section_title;

    // INPUTS (?)
    public $inputs;
    
    // BUTTONS
    public $btn_class_accept;
    public $btn_class_cancel;
    public $btn_name_accept;
    public $btn_name_cancel;
    
    public function __constructor($section_title, $inputs, $btn_class_accept, $btn_class_cancel, $btn_name_accept, $btn_name_cancel)
    {
        $this->section_title = $section_title;
        $this->inputs = $inputs;
        $this->btn_class_accept = $btn_class_accept;
        $this->btn_class_cancel = $btn_class_cancel;
        $this->btn_name_accept = $btn_name_accept;
        $this->btn_name_cancel = $btn_name_cancel;
    }

    public function render()
    {
        return view('livewire.organisms.form');
    }
}
