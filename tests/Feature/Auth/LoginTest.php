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
            $new_user = User::factory(1)->create([
                'name' => 'Peter',
                'email' => 'peter@example.com',
                'password' => '00000000'
            ])->toArray();
            
        //When
            $response = $this->post(route('login'), ['new_user' => $new_user]);

        //Then
            $response->assertRedirect(url('/'))
                     ->assertSee($new_user[1]);
    }
}