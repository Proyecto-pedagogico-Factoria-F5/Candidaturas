<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Profile;
use App\Models\School;
use App\Models\Promo;
use App\Models\Role;

class Profiles extends Component
{
    use WithPagination;
	use WithFileUploads;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $school_id, $promo_id, $role_id, $name, $surnames, $email, $password, $job, $github, $birth_date, $image;
    public $validationArray = [
        'school_id' => 'required',
		'promo_id' => 'required',
		'role_id' => 'required',
		'name' => 'required',
		'surnames' => 'required',
		'email' => 'required',
		'password' => 'required',
		'job' => 'required',
		'github' => 'required',
		'birth_date' => 'required',
		'image' => 'image|max:1024', // 1MB Max
    ];
	public function data () {
		return [
			'school_id' => $this->school_id,
			'promo_id' => $this->promo_id,
			'role_id' => $this->role_id,
			'name' => $this->name,
			'surnames' => $this->surnames,
			'email' => $this->email,
			'password' => $this->password,
			'job' => $this->job,
			'github' => $this->github,
			'birth_date' => $this->birth_date,
			'image' => $this->image->store('uploads', 'public'),
	];}
	public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.profiles.view', [
            'profiles' => Profile::latest()
						->orWhere('school_id', 'LIKE', $keyWord)
						->orWhere('promo_id', 'LIKE', $keyWord)
						->orWhere('role_id', 'LIKE', $keyWord)
						->orWhere('name', 'LIKE', $keyWord)
						->orWhere('surnames', 'LIKE', $keyWord)
						->orWhere('email', 'LIKE', $keyWord)
						->orWhere('password', 'LIKE', $keyWord)
						->orWhere('job', 'LIKE', $keyWord)
						->orWhere('github', 'LIKE', $keyWord)
						->orWhere('birth_date', 'LIKE', $keyWord)
						->orWhere('image', 'LIKE', $keyWord)
						->paginate(10),
			'schools' => School::all(),
			'promos' => Promo::all(),
			'roles' => Role::all()
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
		$this->role_id = null;
		$this->name = null;
		$this->surnames = null;
		$this->email = null;
		$this->password = null;
		$this->job = null;
		$this->github = null;
		$this->birth_date = null;
		$this->image = null;
    }

    public function store()
    {
        $this->validate($this->validationArray);

        Profile::create($this->data());
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Perfil creado correctamente.');
    }

    public function edit($id)
    {
        $record = Profile::findOrFail($id);

        $this->selected_id = $id; 
		$this->school_id = $record->school_id;
		$this->promo_id = $record->promo_id;
		$this->role_id = $record->role_id;
		$this->name = $record->name;
		$this->surnames = $record->surnames;
		$this->email = $record->email;
		$this->password = $record->password;
		$this->job = $record->job;
		$this->github = $record->github;
		$this->birth_date = $record->birth_date;
		$this->image = $record->image;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate($this->validationArray);

        if ($this->selected_id) {
			$record = Profile::find($this->selected_id);
            $record->update($this->data());

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
