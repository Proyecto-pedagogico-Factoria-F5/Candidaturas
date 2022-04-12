<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

use App\Models\School;

class Schools extends Component
{
    use WithPagination;
    use WithFileUploads;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $name, $province, $image, $imageOld;
    
    public $validationArray = [
        'name' => 'required',
        'province' => 'required',
        'image' => 'image|max:1024', // 1MB Max
    ];

    public $validationArrayWithoutImage = [
        'name' => 'required',
        'province' => 'required',
    ];

    public function data () {
        return [
        'name' => $this-> name,
        'province' => $this-> province,
        'image' => $this->image->store('uploads', 'public')
    ];}

    public function dataUpdated ($updatedImage) {
        return [
        'name' => $this-> name,
        'province' => $this-> province,
        'image' => $updatedImage
    ];}


    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.schools.view', [
            'schools' => School::oldest()
                        ->orWhere('name', 'LIKE', $keyWord)
                        ->orWhere('province', 'LIKE', $keyWord)
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
		$this->province = null;
		$this->image = null;
    }

    public function store()
    {
        $this->validate($this->validationArray);

        School::create($this->data());
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Escuela creada correctamente.');
    }

    public function edit($id)
    {
        $record = School::findOrFail($id);

        $this->selected_id = $id; 
        $this->name = $record-> name;
		$this->province = $record-> province;
		$this->imageOld = $record-> image;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $updatedImage = '';

        if($this->image == null) {
            $this->validate($this->validationArrayWithoutImage);
            $updatedImage = $this->imageOld;
        }else{  
            $this->validate($this->validationArray);          
            $updatedImage = $this->image->store('uploads', 'public');
        }

        if ($this->selected_id) {
			$record = School::find($this->selected_id);
            $record->update($this->dataUpdated($updatedImage));

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Escuela actualizada correctamente.');
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
