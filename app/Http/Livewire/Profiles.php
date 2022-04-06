<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Profile;
use App\Models\School;
use App\Models\Promo;
use App\Models\Role;
use App\Models\User;

class Profiles extends Component
{
    use WithPagination;
	use WithFileUploads;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $school_id, $promo_id, $role_id, $name, $surnames, $email, $password, $job, $github, $birth_date, $image;
    public $validationArray = [
		// User values
		'name' => ['required', 'string', 'max:255'],
		'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
		'password' => ['required', 'string', 'min:8', 'confirmed'],
		// Profile values
		'surnames' => 'required',
		'job' => 'required',
		'github' => 'required',
		'birth_date' => 'required',
		'image' => 'image|max:1024', // 1MB Max
    ];
	public function data () {
		return [
			'surnames' => $this->surnames,	
			'job' => $this->job,
			'github' => $this->github,
			'birth_date' => $this->birth_date,
			'image' => $this->image->store('uploads', 'public'),
		];
	}
	public function dataSchool() {
        return [
            'school_id' => $this->school_id,
        ];
    }
	public function dataPromo() {
        return [
            'promo_id' => $this->promo_id,
        ];
    }
	public function dataRole() {
        return [
            'role_id' => $this->role_id,
        ];
    }
	public function dataUser() {
		return [
			'name' => $this->name,
			'password' => $this->password,
			'email' => $this->email,
		];
	}
	public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.profiles.view', [
            'profiles' => Profile::latest()
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
		User::create($this->dataUser());
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Perfil creado correctamente.');
    }

    public function edit($id)
    {
        $record = Profile::findOrFail($id);

		$this->selected_id = $id; 
		
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

	// public function user()
	// {
	// 	return $this->belongsTo(User::class);
	// }

	// static function addToPivotTable($profile_id, $user_id)
	// {
	// 	$profile_id->user()->attach(User::getUserByID($user_id['user_id']));
	// }

	public function getProfileByUser($id)
	{
		$user = User::findOrFail($id);
		$profile = $user->profile;

		return view('user/perfil/', compact('profile'));
	}
}