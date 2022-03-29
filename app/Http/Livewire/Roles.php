<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Role;

class Roles extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $name;
    public $validationArray = [
        'name' => 'required',
    ];
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.roles.view', [
            'roles' => Role::oldest()
						->orWhere('name', 'LIKE', $keyWord)
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
    }

    public function store()
    {
        $this->validate($this->validationArray);

        Role::create([ 
			'name' => $this-> name,
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Rol creado correctamente.');
    }

    public function edit($id)
    {
        $record = Role::findOrFail($id);

        $this->selected_id = $id; 
		$this->name = $record-> name;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate($this->validationArray);

        if ($this->selected_id) {
			$record = Role::find($this->selected_id);
            $record->update([ 
				'name' => $this-> name,
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Rol actualizado correctamente.');
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
