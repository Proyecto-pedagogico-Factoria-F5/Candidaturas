<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\School;
use App\Models\User;
class CrudSchoolTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_school_read_in_view_schools()
    {
        // Given 
        $user = User::factory()->create();
        $school = School::factory()->create([
            'nombre_escuela' => 'Gijón',
            'provincia' => 'Asturias',
            'imagen' => 'uploads/mbEwEwo3SoMqFzgsDFUQcSHhkHV6QrKeF65REeSp.jpg',
            ])->toArray();
          
        // When
        $response = $this->actingAs($user)
                            ->withSession(['banned' => false])
                            ->get('/schools-view', $school = ['school']);
       
        // Then 
        $response->assertStatus(200)
                 ->assertSeeText('Asturias')
                 ->assertViewIs('schools-view');
    }

    public function test_school_read_in_view_administrar_schools()
    {
        // Given 
        $user = User::factory()->create();
        $school = School::factory()->create([
            'nombre_escuela' => 'Curso de Factoría F5 FullStack',
			'ubicación' => 'Madrid',
			'escuela_id' => '1',
			'fecha_de_inicio' => '2022-03-03',
			'duración' => '850h',
			'url' => 'rompemosloscodigos.com',
			'imagen' => 'Curso.jpg',
        ])->toArray();
        
        // When
        $response = $this->actingAs($user)
                         ->withSession(['banned' => false])
                         ->get('/schools', $school = ['school']);
       
        // Then 
        $response->assertStatus(200)
                 ->assertSeeText('Curso de Factoría F5 FullStack')
                 ->assertViewIs('livewire.shcools.index');
    }

    
    public function test_school_create()
    {
        // Given 
        $user = User::factory()->create();
        $school = School::factory()->make([
            'nombre_school' => 'Curso FullStack',
			'ubicación' => 'Madrid',
			'escuela_id' => '1',
			'fecha_de_inicio' => '2022-03-03',
			'duración' => '850h',
			'url' => 'rompemosloscodigos.com',
			'imagen' => 'Curso.jpg',
        ])->toArray();
        
        // When
        $this->actingAs($user)
             ->withSession(['banned' => false])
             ->post('/schools.store', $school = ['school']);
             
        $response = $this->actingAs($user)
                        ->withSession(['banned' => false])
                        ->get('/schools');
       
        // Then 
        $response->assertStatus(200)
                 ->assertSeeText('Curso FullStack')
                 ->assertViewIs('/schools');
    }
    
}