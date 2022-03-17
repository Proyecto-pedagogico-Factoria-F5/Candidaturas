<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Profile;

class Profiles extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre, $email, $password, $teléfono, $puesto, $role, $escuela, $promo, $imagen;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.profiles.view', [
            'profiles' => Profile::latest()
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('email', 'LIKE', $keyWord)
						->orWhere('password', 'LIKE', $keyWord)
						->orWhere('teléfono', 'LIKE', $keyWord)
						->orWhere('puesto', 'LIKE', $keyWord)
						->orWhere('role', 'LIKE', $keyWord)
						->orWhere('escuela', 'LIKE', $keyWord)
						->orWhere('promo', 'LIKE', $keyWord)
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
		$this->nombre = null;
		$this->email = null;
		$this->password = null;
		$this->teléfono = null;
		$this->puesto = null;
		$this->role = null;
		$this->escuela = null;
		$this->promo = null;
		$this->imagen = null;
    }

    public function store()
    {
        $this->validate([
		'nombre' => 'required',
		'email' => 'required',
		'teléfono' => 'required',
		'puesto' => 'required',
		'role' => 'required',
		'escuela' => 'required',
		'promo' => 'required',
		'imagen' => 'required',
        ]);

        Profile::create([ 
			'nombre' => $this-> nombre,
			'email' => $this-> email,
			'password' => $this-> password,
			'teléfono' => $this-> teléfono,
			'puesto' => $this-> puesto,
			'role' => $this-> role,
			'escuela' => $this-> escuela,
			'promo' => $this-> promo,
			'imagen' => $this-> imagen
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Profile Successfully created.');
    }

    public function edit($id)
    {
        $record = Profile::findOrFail($id);

        $this->selected_id = $id; 
		$this->nombre = $record-> nombre;
		$this->email = $record-> email;
		$this->password = $record-> password;
		$this->teléfono = $record-> teléfono;
		$this->puesto = $record-> puesto;
		$this->role = $record-> role;
		$this->escuela = $record-> escuela;
		$this->promo = $record-> promo;
		$this->imagen = $record-> imagen;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'nombre' => 'required',
		'email' => 'required',
		'password' => 'required',
		'teléfono' => 'required',
		'puesto' => 'required',
		'role' => 'required',
		'escuela' => 'required',
		'promo' => 'required',
		'imagen' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Profile::find($this->selected_id);
            $record->update([ 
			'nombre' => $this-> nombre,
			'email' => $this-> email,
			'password' => $this-> password,
			'teléfono' => $this-> teléfono,
			'puesto' => $this-> puesto,
			'role' => $this-> role,
			'escuela' => $this-> escuela,
			'promo' => $this-> promo,
			'imagen' => $this-> imagen
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Profile Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Profile::where('id', $id);
            $record->delete();
        }
    }
}
