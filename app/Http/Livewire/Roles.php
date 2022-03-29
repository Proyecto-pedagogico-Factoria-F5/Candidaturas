<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Role;

class Roles extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $user_id, $name;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.roles.view', [
            'roles' => Role::oldest()
						->orWhere('user_id', 'LIKE', $keyWord)
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
		$this->user_id = null;	
		$this->nombre = null;
    }

    public function store()
    {
        $this->validate([
			'user_id' => 'required',
			'nombre' => 'required',
        ]);

        Role::create([ 
			'user_id' => $this-> user_id,
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
		$this->user_id = $record-> user_id;
		$this->name = $record-> name;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
			'user_id' => 'required',
			'nombre' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Role::find($this->selected_id);
            $record->update([ 
				'user_id' => $this-> user_id,
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
