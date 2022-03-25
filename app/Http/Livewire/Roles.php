<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Role;

class Roles extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    // public $selected_id, $keyWord, $nombre, $email, $teléfono, $puesto, $escuela, $promo, $imagen;
	public $selected_id, $keyWord, $nombre;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.roles.view', [
            'roles' => Role::latest()
						->orWhere('nombre', 'LIKE', $keyWord)
						// ->orWhere('email', 'LIKE', $keyWord)
						// ->orWhere('teléfono', 'LIKE', $keyWord)
						// ->orWhere('puesto', 'LIKE', $keyWord)
						// ->orWhere('escuela', 'LIKE', $keyWord)
						// ->orWhere('promo', 'LIKE', $keyWord)
						// ->orWhere('imagen', 'LIKE', $keyWord)
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
		$this->nombre = null;
		// $this->email = null;
		// $this->teléfono = null;
		// $this->puesto = null;
		// $this->escuela = null;
		// $this->promo = null;
		// $this->imagen = null;
    }

    public function store()
    {
        $this->validate([
		'nombre' => 'required',
		// 'email' => 'required',
		// 'teléfono' => 'required',
		// 'puesto' => 'required',
		// 'escuela' => 'required',
		// 'promo' => 'required',
		// 'imagen' => 'required',
        ]);

        Role::create([ 
			'nombre' => $this-> nombre,
			// 'email' => $this-> email,
			// 'teléfono' => $this-> teléfono,
			// 'puesto' => $this-> puesto,
			// 'escuela' => $this-> escuela,
			// 'promo' => $this-> promo,
			// 'imagen' => $this-> imagen
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Role Successfully created.');
    }

    public function edit($id)
    {
        $record = Role::findOrFail($id);

        $this->selected_id = $id; 
		$this->nombre = $record-> nombre;
		// $this->email = $record-> email;
		// $this->teléfono = $record-> teléfono;
		// $this->puesto = $record-> puesto;
		// $this->escuela = $record-> escuela;
		// $this->promo = $record-> promo;
		// $this->imagen = $record-> imagen;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'nombre' => 'required',
		// 'email' => 'required',
		// 'teléfono' => 'required',
		// 'puesto' => 'required',
		// 'escuela' => 'required',
		// 'promo' => 'required',
		// 'imagen' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Role::find($this->selected_id);
            $record->update([ 
			'nombre' => $this-> nombre,
			// 'email' => $this-> email,
			// 'teléfono' => $this-> teléfono,
			// 'puesto' => $this-> puesto,
			// 'escuela' => $this-> escuela,
			// 'promo' => $this-> promo,
			// 'imagen' => $this-> imagen
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Role Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Role::where('id', $id);
            $record->delete();
        }
    }
}
