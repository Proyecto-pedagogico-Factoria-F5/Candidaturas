<?php

namespace Tests\Feature;

use App\Models\School;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Http\Livewire\Schools;

class CrudSchoolTest extends TestCase
{   
    use RefreshDatabase;
    /**
    * A basic feature test example.
    *
    * @return void
    */

    public function test_nombre()
    {
        //Given


        //When


        //Then

        $response = $this->get('/');

        $response->assertStatus(200);
        
    }
    public function test_school_entity()
    {
        $school = new School([
           // $this->name=> 
            'name'=> 'Asturias', 
           // $this->province=>
            'province' => 'Asturias', 
           // $this->image=>
            'image' => 'image',
            
        ]); 

        $this->assertEquals('Asturias', $school->getName());
        $this->assertEquals('Asturias', $school->getProvince());
        $this->assertEquals('image', $school->getImage());
    
    }

    public function test_school_can_be_deleted()
    {
        $school = School::factory()->create();
    
        $school->delete();
    
        $this->assertModelMissing($school); 
   }
}