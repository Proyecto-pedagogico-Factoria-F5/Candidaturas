<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
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

        $response->assertStatus(200)

        ->assertSee($element->title);
    }
        
    
}