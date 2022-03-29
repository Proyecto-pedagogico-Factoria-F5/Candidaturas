<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Profile;
use App\Models\Role;
use App\Models\School;
use App\Models\Promo;

class Profiles extends Component
{
    use WithPagination;
	use WithFileUploads;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $school_id, $promo_id, $name, $surnames, $email, $password, $job, $role, $github, $birth_date, $image;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.profiles.view', [
            'profiles' => Profile::latest()
						->orWhere('school_id', 'LIKE', $keyWord)
						->orWhere('promo_id', 'LIKE', $keyWord)
						->orWhere('name', 'LIKE', $keyWord)
						->orWhere('surnames', 'LIKE', $keyWord)
						->orWhere('email', 'LIKE', $keyWord)
						->orWhere('password', 'LIKE', $keyWord)
						->orWhere('job', 'LIKE', $keyWord)
						->orWhere('role', 'LIKE', $keyWord)
						->orWhere('github', 'LIKE', $keyWord)
						->orWhere('birth_date', 'LIKE', $keyWord)
						->orWhere('image', 'LIKE', $keyWord)
						->paginate(10),
			'roles' => Role::all(),
			'schools' => School::all(),
			'promos' => Promo::all(),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->school_id = null;
		$this->promo_id = null;
		$this->name = null;
		$this->surnames = null;
		$this->email = null;
		$this->password = null;
		$this->job = null;
		$this->role = null;
		$this->github = null;
		$this->birth_date = null;
		$this->imagen = null;
    }

    public function store()
    {
        $this->validate([
			'school_id' => 'required',
			'promo_id' => 'required',
            'name' => 'required',
            'surnames' => 'required',
			'email' => 'required',
			'password' => 'required',
			'job' => 'required',
			'role' => 'required',
			'github' => 'required',
			'birth_date' => 'required',
			'image' => 'image|max:1024', // 1MB Max
        ]);

        Profile::create([ 
			'school_id' => $this->school_id,
			'promo_id' => $this->promo_id,
			'name' => $this-> name,
			'surnames' => $this-> surnames,
			'email' => $this-> email,
			'password' => $this-> password,
			'job' => $this-> job,
			'role' => $this-> role,
			'github' => $this-> github,
			'birth_date' => $this-> birth_date,
			'image' => $this->imagen->store('uploads', 'public'),
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Perfil creado correctamente.');
    }

    public function edit($id)
    {
        $record = Profile::findOrFail($id);

        $this->selected_id = $id; 
		$this->school_id = $record-> school_id;
		$this->promo_id = $record-> promo_id;
		$this->name = $record-> name;
		$this->surnames = $record-> surnames;
		$this->email = $record-> email;
		$this->password = $record-> password;
		$this->job = $record-> job;
		$this->role = $record-> role;
		$this->github = $record-> github;
		$this->birth_date = $record-> birth_date;
		$this->image = $record-> image;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
			'school_id' => 'required',
			'promo_id' => 'required',
            'name' => 'required',
            'surnames' => 'required',
			'email' => 'required',
			'password' => 'required',
			'job' => 'required',
			'role' => 'required',
			'github' => 'required',
			'birth_date' => 'required',
			'image' => 'image|max:1024', // 1MB Max
        ]);

        if ($this->selected_id) {
			$record = Profile::find($this->selected_id);
            $record->update([ 
				'school_id' => $this->school_id,
				'promo_id' => $this->promo_id,
				'name' => $this-> name,
				'surnames' => $this-> surnames,
				'email' => $this-> email,
				'password' => $this-> password,
				'job' => $this-> job,
				'role' => $this-> role,
				'github' => $this-> github,
				'birth_date' => $this-> birth_date,
				'image' => $this->imagen->store('uploads', 'public'),
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Perfil actualizado correctamente.');
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
