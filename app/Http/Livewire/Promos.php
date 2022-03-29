<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Promo;

class Promos extends Component
{
    use WithPagination;
	use WithFileUploads;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre_promo, $location, $escuela_id, $fecha_de_inicio, $duration, $url, $image, $code;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.promos.view', [
            'promos' => Promo::latest()
						->orWhere('nombre_promo', 'LIKE', $keyWord)
						->orWhere('location', 'LIKE', $keyWord)
						->orWhere('escuela_id', 'LIKE', $keyWord)
						->orWhere('fecha_de_inicio', 'LIKE', $keyWord)
						->orWhere('duration', 'LIKE', $keyWord)
						->orWhere('url', 'LIKE', $keyWord)
						->orWhere('image', 'LIKE', $keyWord)
						->orWhere('code', 'LIKE', $keyWord)
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
		$this->location = null;
		$this->escuela_id = null;
		$this->fecha_de_inicio = null;
		$this->duration = null;
		$this->url = null;
		$this->image = null;
		$this->code = null;
    }

    public function store()
    {
        $this->validate([
		'nombre_promo' => 'required',
		'location' => 'required',
		'escuela_id' => 'required',
		'fecha_de_inicio' => 'required',
		'duration' => 'required',
		'url' => 'required',
		'image' => 'image|max:1024', // 1MB Max
		'code' => 'required',
        ]);

        Promo::create([ 
			'nombre_promo' => $this-> nombre_promo,
			'location' => $this-> location,
			'escuela_id' => $this-> escuela_id,
			'fecha_de_inicio' => $this-> fecha_de_inicio,
			'duration' => $this-> duration,
			'url' => $this-> url,
			'image' => $this->image->store('uploads', 'public'),
			'code' => $this-> code
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Promo creada con éxito');
    }

    public function edit($id)
    {
        $record = Promo::findOrFail($id);

        $this->selected_id = $id; 
		$this->nombre_promo = $record-> nombre_promo;
		$this->location = $record-> location;
		$this->escuela_id = $record-> escuela_id;
		$this->fecha_de_inicio = $record-> fecha_de_inicio;
		$this->duration = $record-> duration;
		$this->url = $record-> url;
		$this->image = $record-> image;
		$this->code = $record-> code;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'nombre_promo' => 'required',
		'location' => 'required',
		'escuela_id' => 'required',
		'fecha_de_inicio' => 'required',
		'duration' => 'required',
		'url' => 'required',
		'image' => 'image|max:1024', // 1MB Max
		'code' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Promo::find($this->selected_id);
            $record->update([ 
			'nombre_promo' => $this-> nombre_promo,
			'location' => $this-> location,
			'escuela_id' => $this-> escuela_id,
			'fecha_de_inicio' => $this-> fecha_de_inicio,
			'duration' => $this-> duration,
			'url' => $this-> url,
			'image' => $this->image->store('uploads', 'public'),
			'code' => $this-> code
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Promo actualizada con éxito');
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