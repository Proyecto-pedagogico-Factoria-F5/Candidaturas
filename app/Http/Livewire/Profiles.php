<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Profile;

class Profiles extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $name, $email, $password, $phone, $job, $role_id, $escuela_id, $promo, $image;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.profiles.view', [
            'profiles' => Profile::latest()
						->orWhere('name', 'LIKE', $keyWord)
						->orWhere('email', 'LIKE', $keyWord)
						->orWhere('password', 'LIKE', $keyWord)
						->orWhere('phone', 'LIKE', $keyWord)
						->orWhere('job', 'LIKE', $keyWord)
						->orWhere('role_id', 'LIKE', $keyWord)
						->orWhere('escuela_id', 'LIKE', $keyWord)
						->orWhere('promo', 'LIKE', $keyWord)
						->orWhere('image', 'LIKE', $keyWord)
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
		$this->email = null;
		$this->password = null;
		$this->phone = null;
		$this->job = null;
		$this->role_id = null;
		$this->escuela_id = null;
		$this->promo = null;
		$this->image = null;
    }

    public function store()
    {
        $this->validate([
		'name' => 'required',
		'email' => 'required',
		'phone' => 'required',
		'job' => 'required',
		'role_id' => 'required',
		'escuela_id' => 'required',
		'promo' => 'required',
		'image' => 'required',
        ]);

        Profile::create([ 
			'name' => $this-> name,
			'email' => $this-> email,
			'password' => $this-> password,
			'phone' => $this-> phone,
			'job' => $this-> job,
			'role_id' => $this-> role_id,
			'escuela_id' => $this-> escuela_id,
			'promo' => $this-> promo,
			'image' => $this-> image
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Profile Successfully created.');
    }

    public function edit($id)
    {
        $record = Profile::findOrFail($id);

        $this->selected_id = $id; 
		$this->name = $record-> name;
		$this->email = $record-> email;
		$this->password = $record-> password;
		$this->phone = $record-> phone;
		$this->job = $record-> job;
		$this->role_id = $record-> role_id;
		$this->escuela_id = $record-> escuela_id;
		$this->promo = $record-> promo;
		$this->image = $record-> image;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'name' => 'required',
		'email' => 'required',
		'password' => 'required',
		'phone' => 'required',
		'job' => 'required',
		'role_id' => 'required',
		'escuela_id' => 'required',
		'promo' => 'required',
		'image' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Profile::find($this->selected_id);
            $record->update([ 
			'name' => $this-> name,
			'email' => $this-> email,
			'password' => $this-> password,
			'phone' => $this-> phone,
			'job' => $this-> job,
			'role_id' => $this-> role_id,
			'escuela_id' => $this-> escuela_id,
			'promo' => $this-> promo,
			'image' => $this-> image
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
