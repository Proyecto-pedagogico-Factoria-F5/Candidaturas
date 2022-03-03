<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\School;

class Schools extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $name, $location;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.schools.view', [
            'schools' => School::latest()
						->orWhere('nombre_escuela', 'LIKE', $keyWord)
						->orWhere('provincia', 'LIKE', $keyWord)
                        ->orWhere('imagen', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->nombre_escuela = null;
		$this->provincia = null;
        $this->imagen = null;
    }

    public function store()
    {
        $this->validate([
            'nombre_escuela' => 'required',
            'provincia' => 'required',
            'imagen' => 'required',
        ]);

        School::create([ 
			'nombre_escuela' => $this-> nombre_escuela,
			'provincia' => $this-> provincia,
            'imagen' => $this-> imagen
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Escuela creada con éxito');
    }

    public function edit($id)
    {
        $record = School::findOrFail($id);

        $this->selected_id = $id; 
		$this->nombre_escuela = $record-> nombre_escuela;
		$this->provincia = $record-> provincia;
        $this->imagen = $record-> imagen;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'nombre_escuela' => 'required',
		'provincia' => 'required',
        'imagen' => 'required',
        ]);

        if ($this->selected_id) {
			$record = School::find($this->selected_id);
            $record->update([ 
			'nombre_escuela' => $this-> nombre_escuela,
			'provincia' => $this-> provincia,
            'imagen' => $this-> imagen
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Escuela actualizada con éxito');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = School::where('id', $id);
            $record->delete();
        }
    }
}
