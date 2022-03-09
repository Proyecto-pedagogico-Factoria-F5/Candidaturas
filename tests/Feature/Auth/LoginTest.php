<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{   
    use RefreshDatabase;
    /**
    * A basic feature test example.
    *
    * @return void
    */

    public function test_user_can_login()
    {
        //Given


        //When


        //Then

        $response = $this->get('/');

        $response->assertStatus(200);
        
    }
}