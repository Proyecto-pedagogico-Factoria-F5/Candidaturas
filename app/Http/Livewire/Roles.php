<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Role;

class Roles extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $superadmin, $regional, $provincial, $local;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.roles.view', [
            'roles' => Role::latest()
						->orWhere('superadmin', 'LIKE', $keyWord)
						->orWhere('regional', 'LIKE', $keyWord)
						->orWhere('provincial', 'LIKE', $keyWord)
						->orWhere('local', 'LIKE', $keyWord)
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
		$this->superadmin = null;
		$this->regional = null;
		$this->provincial = null;
		$this->local = null;
		
    }

    public function store()
    {
        $this->validate([
		'superadmin' => 'required',
		'regional' => 'required',
		'provincial' => 'required',
		'local' => 'required',
		
        ]);

        Role::create([ 
			'superadmin' => $this-> superadmin,
			'regional' => $this-> regional,
			'provincial' => $this-> provincial,
			'local' => $this-> local,
			
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Role Successfully created.');
    }

    public function edit($id)
    {
        $record = Role::findOrFail($id);

        $this->selected_id = $id; 
		$this->superadmin = $record-> superadmin;
		$this->regional = $record-> regional;
		$this->provincial = $record-> provincial;
		$this->local = $record-> local;
		
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'superadmin' => 'required',
		'regional' => 'required',
		'provincial' => 'required',
		'local' => 'required',
		
        ]);

        if ($this->selected_id) {
			$record = Role::find($this->selected_id);
            $record->update([ 
			'superadmin' => $this-> superadmin,
			'regional' => $this-> regional,
			'provincial' => $this-> provincial,
			'local' => $this-> local,
			
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
