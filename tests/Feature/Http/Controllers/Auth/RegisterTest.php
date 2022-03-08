<?php

namespace Tests\Feature\Http\Controllers\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    /** @test */
    public function register_creates_and_authenticates_a_user()
    {
    $response = $this->post(route('register'), [
        'name' => 'ignacio moreno',
        'email' => 'imoreno.im69@gmail.com',
        'password' => 'Imorefris1'
    ]);

    $response->assertRedirect(url('/'));
}
}
