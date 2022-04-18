<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Http\Livewire\Promos;
use App\Models\Promo;

class CrudPromoTest extends TestCase
{   
    use RefreshDatabase;
    /**
    * A basic feature test example.
    *
    * @return void
    */

    public function a_promo_can_be_created()
    {  
        $this->withExceptionHandling();
        $response = $this->post('/promos', [
            'name' => 'Test Name'

        ]);

        $response->assertOK();
        $this->assertCount(1, Promo::all());
         
        $promo = Promo::first();

        $this->assertEquals($promo->name, 'Test Name');

    }

    public function test_name()
    {

  
         $response = $this->get('/');

         $response->assertStatus(200);
        
    }

    public function test_promo_entity_name()
    {
        $promo = new Promo([
            'name'=> 'Full Stack']); 

        $this->assertEquals('Full Stack', $promo->getName());
       
    }

    public function test_promo_entity_code()
    {
        $promo = new Promo([
            'code'=> 'y8uHgT16']); 

        $this->assertEquals('y8uHgT16', $promo->getCode());
       
    }

    public function test_promo_entity_duration()
    {
        $promo = new Promo([
            'duration'=> '850 h']); 

        $this->assertEquals('850 h', $promo->getDuration());
       
    }

    public function test_promo_can_be_deleted()
    {
        $promo = Promo::factory()->create();
    
        $promo->delete();
    
        $this->assertModelMissing($promo); 
   }


}