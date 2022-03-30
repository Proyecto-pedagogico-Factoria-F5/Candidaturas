<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Candidatura;

class Candidaturas extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
	public $selected_id, $keyWord, $name, $surnames, $birth_date, $nationality, $email, $phone, $register_date, $user_account, $points, $description, $selected;
    public $validationArray = [
        'promo_id' => 'required',
        'name' => 'required',
        'surnames' => 'required',
        'birth_date' => 'required',
        'nationality' => 'required',
        'email' => 'required',
        'phone' => 'required',
        'register_date' => 'required',
        'user_account' => 'required',
        'points' => 'required',
        'description' => 'required',
        'selected' => 'required'
    ];
    public function data () {
        return [
            'promo_id' => $this->promo_id,
            'name' => $this->name,
            'surnames' => $this->surnames,
            'birth_date' => $this->birth_date,
            'nationality' => $this->natiomality,
            'email' => $this->email,
            'phone' => $this->phone,
            'register_date' => $this->register_date,
            'user_account' => $this->user_account,
            'points' => $this->points,
            'description' => $this->description,
            'selected' => $this->selected
    ];}
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.candidaturas.view', [
            'candidaturas' => Candidatura::oldest()
						->orWhere('promo_id', 'LIKE', $keyWord)
						->orWhere('name', 'LIKE', $keyWord)
						->orWhere('surnames', 'LIKE', $keyWord)
                        ->orWhere('birth_date', 'LIKE', $keyWord)
                        ->orWhere('nationality', 'LIKE', $keyWord)
						->orWhere('email', 'LIKE', $keyWord)
						->orWhere('phone', 'LIKE', $keyWord)
                        ->orWhere('register_date', 'LIKE', $keyWord)
                        ->orWhere('user_account', 'LIKE', $keyWord)
                        ->orWhere('points', 'LIKE', $keyWord)
                        ->orWhere('description', 'LIKE', $keyWord)
                        ->orWhere('selected', 'LIKE', $keyWord)
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
		$this->promo_id = null;
        $this->name = null;
        $this->surnames = null;
        $this->birth_date = null;
        $this->nationality = null;
        $this->email = null;
        $this->phone = null;
        $this->register_date = null;
        $this->user_account = null;
        $this->points = null;
        $this->description = null;
        $this->selected = null;
    }

    public function store()
    {
        $this->validate($this->validationArray);

        Candidatura::create($this->data());
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Candidatura creada correctamente.');
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
		$this->puntos = $record-> puntos;
		$this->descripción = $record-> descripción;
		$this->fecha_de_registro = $record-> fecha_de_registro;
		$this->fecha_de_nacimiento = $record-> fecha_de_nacimiento;
		$this->nacionalidad = $record-> nacionalidad;
		$this->promo_id = $record-> promo_id;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate($this->validationArray);

        if ($this->selected_id) {
			$record = Candidatura::find($this->selected_id);
            $record->update($this->data());

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Candidatura actualizada correctamente.');
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
