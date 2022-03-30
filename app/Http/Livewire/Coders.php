<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Coder;

class Coders extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
	public $selected_id, $keyWord, $promo_id, $name, $surnames, $birth_date, $nationality, $email, $phone, $register_date, $user_account, $points, $github;
    public $validationArray = [
        'promo_id' => 'required',
        'name' => 'required',
        'surnames' => 'required',
        'birth_date' => 'required',
        'nationality' => 'required',
        'email' => 'required',
        'phone' => 'required',
        'register_date' => 'required',
        'user_account' => 'required',
        'points' => 'required',
        'github' => 'required',
    ];
    public function data () {
        return [
            'promo_id' => $this->promo_id,
            'name' => $this->name,
            'surnames' => $this->surnames,
            'birth_date' => $this->birth_date,
            'nationality' => $this->natiomality,
            'email' => $this->email,
            'phone' => $this->phone,
            'register_date' => $this->register_date,
            'user_account' => $this->user_account,
            'points' => $this->points,
			'github' => $this-> github,
    ];}
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.coders.view', [
            'coders' => Coder::latest()
						->orWhere('name', 'LIKE', $keyWord)
						->orWhere('surnames', 'LIKE', $keyWord)
						->orWhere('birth_date', 'LIKE', $keyWord)
						->orWhere('nationality', 'LIKE', $keyWord)
						->orWhere('email', 'LIKE', $keyWord)
						->orWhere('phone', 'LIKE', $keyWord)
						->orWhere('register_date', 'LIKE', $keyWord)
						->orWhere('user_account', 'LIKE', $keyWord)
						->orWhere('points', 'LIKE', $keyWord)
						->orWhere('github', 'LIKE', $keyWord)
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
        $this->surnames = null;
        $this->birth_date = null;
        $this->nationality = null;
        $this->email = null;
        $this->phone = null;
        $this->register_date = null;
        $this->user_account = null;
        $this->points = null;
		$this->github = null;
    }

    public function store()
    {
        $this->validate($this->validationArray);

        Coder::create($this->data());
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Coder creado correctamente.');
    }

    public function edit($id)
    {
        $record = Coder::findOrFail($id);

        $this->selected_id = $id; 
        
        $this->name = $record->name;
        $this->surnames = $record->surnames;
        $this->birth_date = $record->birth_date;
        $this->natiomality = $record->natiomality;
        $this->email = $record->email;
        $this->phone = $record->phone;
        $this->register_date = $record->register_date;
        $this->user_account = $record->user_account;
        $this->points = $record->points;
		$this->github = $record-> github;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate($this->validationArray);

        if ($this->selected_id) {
			$record = Coder::find($this->selected_id);
            $record->update($this->data());

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Coder actualizado correctamente.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Coder::where('id', $id);
            $record->delete();
        }
    }
}
