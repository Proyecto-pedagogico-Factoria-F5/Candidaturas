<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Promo;

class Promos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre_promo, $ubicación, $escuela_id, $fecha_de_inicio, $duración, $url;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.promos.view', [
            'promos' => Promo::latest()
						->orWhere('nombre_promo', 'LIKE', $keyWord)
						->orWhere('ubicación', 'LIKE', $keyWord)
						->orWhere('escuela_id', 'LIKE', $keyWord)
						->orWhere('fecha_de_inicio', 'LIKE', $keyWord)
						->orWhere('duración', 'LIKE', $keyWord)
						->orWhere('url', 'LIKE', $keyWord)
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
		$this->nombre_promo = null;
		$this->ubicación = null;
		$this->escuela_id = null;
		$this->fecha_de_inicio = null;
		$this->duración = null;
		$this->url = null;
    }

    public function store()
    {
        $this->validate([
		'nombre_promo' => 'required',
		'ubicación' => 'required',
		'escuela_id' => 'required',
		'fecha_de_inicio' => 'required',
		'duración' => 'required',
		'url' => 'required',
        ]);

        Promo::create([ 
			'nombre_promo' => $this-> nombre_promo,
			'ubicación' => $this-> ubicación,
			'escuela_id' => $this-> escuela_id,
			'fecha_de_inicio' => $this-> fecha_de_inicio,
			'duración' => $this-> duración,
			'url' => $this-> url
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Promo Successfully created.');
    }

    public function edit($id)
    {
        $record = Promo::findOrFail($id);

        $this->selected_id = $id; 
		$this->nombre_promo = $record-> nombre_promo;
		$this->ubicación = $record-> ubicación;
		$this->escuela_id = $record-> escuela_id;
		$this->fecha_de_inicio = $record-> fecha_de_inicio;
		$this->duración = $record-> duración;
		$this->url = $record-> url;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'nombre_promo' => 'required',
		'ubicación' => 'required',
		'escuela_id' => 'required',
		'fecha_de_inicio' => 'required',
		'duración' => 'required',
		'url' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Promo::find($this->selected_id);
            $record->update([ 
			'nombre_promo' => $this-> nombre_promo,
			'ubicación' => $this-> ubicación,
			'escuela_id' => $this-> escuela_id,
			'fecha_de_inicio' => $this-> fecha_de_inicio,
			'duración' => $this-> duración,
			'url' => $this-> url
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Promo Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Promo::where('id', $id);
            $record->delete();
        }
    }
}
