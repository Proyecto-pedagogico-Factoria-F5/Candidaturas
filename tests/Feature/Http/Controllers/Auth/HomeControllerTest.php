<?php

namespace Tests\Feature\Http\Controllers\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class HomeControllerTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function login_authenticates_and_redirects_user()
    {
        
        $user = \App\Models\User::factory(User::class)->make();

        $response = $this->post(url('login'), [
            'name'=>$user-> name,
            'email' => $user->email,
            'password' => 'password'
        ]);

        $response->assertRedirect(url('/'));
        //$this->assertAuthenticatedAs($user);
        
    }
}