<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Candidatura;

class CrudCandidaturaTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_read_candidaturas_in_view_candidaturas()
    {
        // Given
        $user = User::factory()->create();
        $candidatura = Candidatura::factory()->create([
            'nombre' => 'Peter',
        ])->toArray();
        
        // When
        $response = $this->actingAs($user)
                         ->withSession(['banned' => false])
                         ->get('/candidaturas', $candidatura = ['candidatura']);
       
        // Then 
        $response->assertStatus(200)
                 ->assertSeeText('Peter')
                 ->assertViewIs('livewire.candidaturas.index');

    }

}
