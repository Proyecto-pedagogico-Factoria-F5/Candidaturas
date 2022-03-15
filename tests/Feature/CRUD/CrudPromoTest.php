<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Promo;
use App\Models\User;
class CrudPromoTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_promo_read_in_view_promos()
    {
        // Given
        $user = User::factory()->create();
        $promo = Promo::factory()->create([
            'nombre_promo' => 'Curso de Factoría F5 FullStack',
			'ubicación' => 'Madrid',
			'fecha_de_inicio' => '2022-03-03',
			'duración' => '850h',
			'imagen' => 'Curso.jpg',
            ])->toArray();
        
        // When 
        $response = $this->actingAs($user)
                            ->withSession(['banned' => false])
                            ->get('/promos-view', $promo = ['promo']);
       
        // Then
        $response->assertStatus(200)
                 ->assertSeeText('Curso de Factoría F5 FullStack')
                 ->assertViewIs('promos-view');
    }

    public function test_promo_read_in_view_administrar_promos()
    {
        // Given
        $user = User::factory()->create();
        $promo = Promo::factory()->create([
            'nombre_promo' => 'Curso de Factoría F5 FullStack',
        ])->toArray();
        
        // When
        $response = $this->actingAs($user)
                         ->withSession(['banned' => false])
                         ->get('/promos', $promo = ['promo']);
       
        // Then 
        $response->assertStatus(200)
                 ->assertSeeText('Curso de Factoría F5 FullStack')
                 ->assertViewIs('livewire.promos.index');
    }
}
