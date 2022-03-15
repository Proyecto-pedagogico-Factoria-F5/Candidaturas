<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
class CrudUserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_read_in_view_my_profile()
    {
        // Given 
        $user = User::factory()->create([
            'name' => 'Peter',
            'email' => 'peter@example.com',
        ]);
        
        // When
        $response = $this->actingAs($user)
                         ->withSession(['banned' => false])
                         ->get('/profile', $user = ['user']);
       
        // Then 
        $response->assertStatus(200)
                 ->assertSeeText('peter@example.com')
                 ->assertViewIs('profile');
    }

    public function test_user_read_in_school_view()
    {
        // Given 
        $user = User::factory()->create([
            'name' => 'Peter',
        ]);
        
        // When
        $response = $this->actingAs($user)
                         ->withSession(['banned' => false])
                         ->get('/schools-view', $user = ['user']);
       
        // Then 
        $response->assertStatus(200)
                 ->assertSeeText('Peter')
                 ->assertViewIs('schools-view');
    }

    public function test_user_read_in_view_administrar_users()
    {
        // Given 
        $admin = User::factory()->create([
            'name' => 'Peter'
        ])->toArray();
        
        // When
        $response = $this->actingAs($admin)
                         ->withSession(['banned' => false])
                         ->get('/users', $user = ['user']);
       
        // Then 
        $response->assertStatus(200)
                 ->assertSeeText('Curso de Factoría F5 FullStack')
                 ->assertViewIs('livewire.users.index');
    }
}
