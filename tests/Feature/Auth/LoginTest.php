<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

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
            // faker user register data
            $new_user = factory(User::class)->create([
                'name' => 'Peter',
                'email' => 'peter@example.com',
                'password' => '00000000'
            ]);

        //When
            // post route registered
            post('/user/register', $new_user);
            // post route login
            $response = get('/user/login', $new_user);

        //Then
            // return view home / Promos
            // check user registration in table
            $response->assertStatus(200)
                     ->assertView('/user/login');
        
    }
}