<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Token;

class Tokens extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $token;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.tokens.view', [
            'tokens' => Token::latest()
						->orWhere('token', 'LIKE', $keyWord)
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
		$this->token = null;
    }

    public function store()
    {
        $this->validate([
		'token' => 'required',
        ]);

        Token::create([ 
			'token' => $this-> token
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Token Successfully created.');
    }

    public function edit($id)
    {
        $record = Token::findOrFail($id);

        $this->selected_id = $id; 
		$this->token = $record-> token;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'token' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Token::find($this->selected_id);
            $record->update([ 
			'token' => $this-> token
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Token Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Token::where('id', $id);
            $record->delete();
        }
    }
}
