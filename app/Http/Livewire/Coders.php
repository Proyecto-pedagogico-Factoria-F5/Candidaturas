<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Coder;

class Coders extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre, $apellidos, $email, $teléfono, $fecha_de_nacimiento, $github, $promo_id;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.coders.view', [
            'coders' => Coder::latest()
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('apellidos', 'LIKE', $keyWord)
						->orWhere('email', 'LIKE', $keyWord)
						->orWhere('teléfono', 'LIKE', $keyWord)
						->orWhere('fecha_de_nacimiento', 'LIKE', $keyWord)
						->orWhere('github', 'LIKE', $keyWord)
						->orWhere('promo_id', 'LIKE', $keyWord)
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
		$this->fecha_de_nacimiento = null;
		$this->github = null;
		$this->promo_id = null;
    }

    public function store()
    {
        $this->validate([
		'nombre' => 'required',
		'apellidos' => 'required',
		'email' => 'required',
		'teléfono' => 'required',
		'fecha_de_nacimiento' => 'required',
		'github' => 'required',
		'promo_id' => 'required',
        ]);

        Coder::create([ 
			'nombre' => $this-> nombre,
			'apellidos' => $this-> apellidos,
			'email' => $this-> email,
			'teléfono' => $this-> teléfono,
			'fecha_de_nacimiento' => $this-> fecha_de_nacimiento,
			'github' => $this-> github,
			'promo_id' => $this-> promo_id
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Coder Successfully created.');
    }

    public function edit($id)
    {
        $record = Coder::findOrFail($id);

        $this->selected_id = $id; 
		$this->nombre = $record-> nombre;
		$this->apellidos = $record-> apellidos;
		$this->email = $record-> email;
		$this->teléfono = $record-> teléfono;
		$this->fecha_de_nacimiento = $record-> fecha_de_nacimiento;
		$this->github = $record-> github;
		$this->promo_id = $record-> promo_id;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'nombre' => 'required',
		'apellidos' => 'required',
		'email' => 'required',
		'teléfono' => 'required',
		'fecha_de_nacimiento' => 'required',
		'github' => 'required',
		'promo_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Coder::find($this->selected_id);
            $record->update([ 
			'nombre' => $this-> nombre,
			'apellidos' => $this-> apellidos,
			'email' => $this-> email,
			'teléfono' => $this-> teléfono,
			'fecha_de_nacimiento' => $this-> fecha_de_nacimiento,
			'github' => $this-> github,
			'promo_id' => $this-> promo_id
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Coder Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Coder::where('id', $id);
            $record->delete();
        }
    }
}
