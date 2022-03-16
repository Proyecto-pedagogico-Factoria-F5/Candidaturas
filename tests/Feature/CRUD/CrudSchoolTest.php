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
			'provincia' => 'Madrid',
			'imagen' => 'uploads/mbEwEwo3SoMqFzgsDFUQcSHhkHV6QrKeF65REeSp.jpg',
        ])->toArray();
        
        // When
        $response = $this->actingAs($user)
                         ->withSession(['banned' => false])
                         ->get('/schools', $school = ['school']);
       
        // Then 
        $response->assertStatus(200)
                 ->assertSeeText('Curso de Factoría F5 FullStack')
                 ->assertViewIs('livewire.schools.index');
    }

    
   /*  public function test_school_create_form_fails()
    {
        // Given 
        $user = User::factory()->create();
        
        // When
        $response = $this->actingAs($user)
             ->withSession(['banned' => false])
             ->post('/schools.store', [
                'nombre_escuela' => 'Curso FullStack',
                'provincia' => 'Madrid',
             ]);
       
        // Then 
        $response->assertStatus(422);
    }
     */

    public function test_school_create()
    {
        // Given 
        $user = User::factory()->create();
        $school = School::factory()->create([
            'nombre_escuela' => 'Curso FullStack',
			'provincia' => 'Madrid',
        ])->toArray();
       
        // When
        $response = $this->actingAs($user)
             ->withSession(['banned' => false])
             ->post('#createDataModal', function ($modal) use($message) {
                $modal->assertSee('livewire.schools.create')
                ->type('nombre_escuela', $message->nombre_escuela)
                ->type('provincia', $message->provincia)
                ->press('@subscribe-button');
                });
             
                
                // Then 
        $response->assertStatus(201)
                ->assertSessionHasNoErrors()
                /* ->assertSeeText('Curso FullStack')
                ->assertViewIs('/schools') */;
                assertEquals('$school->nombre_escuela', $message->nombre_escuela);
            }
}