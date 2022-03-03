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
						->orWhere('name', 'LIKE', $keyWord)
						->orWhere('location', 'LIKE', $keyWord)
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
		$this->name = null;
		$this->location = null;
        $this->imagen = null;
    }

    public function store()
    {
        $this->validate([
		'name' => 'required',
		'location' => 'required',
        ]);

        School::create([ 
			'name' => $this-> name,
			'location' => $this-> location
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'School Successfully created.');
    }

    public function edit($id)
    {
        $record = School::findOrFail($id);

        $this->selected_id = $id; 
		$this->name = $record-> name;
		$this->location = $record-> location;
        $this->imagen = $record-> imagen;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'name' => 'required',
		'location' => 'required',
        'imagen' => 'required',
        ]);

        if ($this->selected_id) {
			$record = School::find($this->selected_id);
            $record->update([ 
			'name' => $this-> name,
			'location' => $this-> location
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'School Successfully updated.');
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
