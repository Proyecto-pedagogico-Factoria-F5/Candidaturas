<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CrudUserTest extends TestCase
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

    public function test_user_entity_email()
    {
        $user = new User([
            'email' => 'sara@gmail.com'
        ]);

        $this->assertEquals('sara@gmail.com', $user->getEmail());
    }

    public function test_user_entity_name()
    {
        $user = new User([
            'name' => 'Sara González'
        ]);

        $this->assertEquals('Sara González', $user->getName());
    }

    public function test_an_action_that_requires_authentication()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user, 'web')
            ->withSession(['banned' => false])
            ->get('/');
    }

    //     public function test_models_can_be_instantiated()
    // {
    //     $user = User::factory()->make();

    //      $this->assertModelExists($user->count(1));
    // }

    public function a_user_can_be_created()
    {
        $this->withExceptionHandling();
        $response = $this->post('/user', [
            'name' => 'Test Name'

        ]);

        $response->assertOK();
        $this->assertCount(1, User::all());

        $user = User::first();

        $this->assertEquals($user->name, 'Test Name');
    }

    public function test_user_can_be_deleted()
    {
        $user = User::factory()->create();

        $user->delete();


        $this->assertModelMissing($user);
    }

    // public function test_autenticated_a_user()
    // {
    //     $user = create('App\User', [
    //         'email' => 'sara@email.com'
    //     ]);

    //     $this->get('/login')->assertSee('Login');
    //     $credentials = ([
    //         'email' => 'sara@email.com',
    //         'password' => 'secret'
    //     ]);

    //     $response = $this->post('/login', $credentials);
    //     $response->assertRedirect('/home');
    //     $this->assertCredentials($credentials);
    // }
}
