<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Candidatura;

class Candidaturas extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre, $apellidos, $email, $teléfono, $cuenta_usuario, $descripción, $fecha_de_registro, $fecha_de_nacimiento, $nacionalidad;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.candidaturas.view', [
            'candidaturas' => Candidatura::latest()
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('apellidos', 'LIKE', $keyWord)
						->orWhere('email', 'LIKE', $keyWord)
						->orWhere('teléfono', 'LIKE', $keyWord)
						->orWhere('cuenta_usuario', 'LIKE', $keyWord)
						->orWhere('descripción', 'LIKE', $keyWord)
						->orWhere('fecha_de_registro', 'LIKE', $keyWord)
						->orWhere('fecha_de_nacimiento', 'LIKE', $keyWord)
						->orWhere('nacionalidad', 'LIKE', $keyWord)
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
		$this->apellidos = null;
		$this->email = null;
		$this->teléfono = null;
		$this->cuenta_usuario = null;
		$this->descripción = null;
		$this->fecha_de_registro = null;
		$this->fecha_de_nacimiento = null;
		$this->nacionalidad = null;
    }

    public function store()
    {
        $this->validate([
		'nombre' => 'required',
		'apellidos' => 'required',
		'email' => 'required',
		'teléfono' => 'required',
		'cuenta_usuario' => 'required',
		'descripción' => 'required',
		'fecha_de_registro' => 'required',
		'fecha_de_nacimiento' => 'required',
		'nacionalidad' => 'required',
        ]);

        Candidatura::create([ 
			'nombre' => $this-> nombre,
			'apellidos' => $this-> apellidos,
			'email' => $this-> email,
			'teléfono' => $this-> teléfono,
			'cuenta_usuario' => $this-> cuenta_usuario,
			'descripción' => $this-> descripción,
			'fecha_de_registro' => $this-> fecha_de_registro,
			'fecha_de_nacimiento' => $this-> fecha_de_nacimiento,
			'nacionalidad' => $this-> nacionalidad
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Candidatura Successfully created.');
    }

    public function edit($id)
    {
        $record = Candidatura::findOrFail($id);

        $this->selected_id = $id; 
		$this->nombre = $record-> nombre;
		$this->apellidos = $record-> apellidos;
		$this->email = $record-> email;
		$this->teléfono = $record-> teléfono;
		$this->cuenta_usuario = $record-> cuenta_usuario;
		$this->descripción = $record-> descripción;
		$this->fecha_de_registro = $record-> fecha_de_registro;
		$this->fecha_de_nacimiento = $record-> fecha_de_nacimiento;
		$this->nacionalidad = $record-> nacionalidad;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'nombre' => 'required',
		'apellidos' => 'required',
		'email' => 'required',
		'teléfono' => 'required',
		'cuenta_usuario' => 'required',
		'descripción' => 'required',
		'fecha_de_registro' => 'required',
		'fecha_de_nacimiento' => 'required',
		'nacionalidad' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Candidatura::find($this->selected_id);
            $record->update([ 
			'nombre' => $this-> nombre,
			'apellidos' => $this-> apellidos,
			'email' => $this-> email,
			'teléfono' => $this-> teléfono,
			'cuenta_usuario' => $this-> cuenta_usuario,
			'descripción' => $this-> descripción,
			'fecha_de_registro' => $this-> fecha_de_registro,
			'fecha_de_nacimiento' => $this-> fecha_de_nacimiento,
			'nacionalidad' => $this-> nacionalidad
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Candidatura Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Candidatura::where('id', $id);
            $record->delete();
        }
    }
}
