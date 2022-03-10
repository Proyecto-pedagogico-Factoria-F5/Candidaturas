<?php

namespace Database\Factories;

use App\Models\Candidatura;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CandidaturaFactory extends Factory
{
    protected $model = Candidatura::class;

    public function definition()
    {
        return [
			'nombre' => $this->faker->name,
			'apellidos' => $this->faker->name,
			'email' => $this->faker->name,
			'teléfono' => $this->faker->name,
			'cuenta_usuario' => $this->faker->name,
			'puntos' => $this->faker->name,
			'descripción' => $this->faker->name,
			'fecha_de_registro' => $this->faker->name,
			'fecha_de_nacimiento' => $this->faker->name,
			'nacionalidad' => $this->faker->name,
			'promo_id' => $this->faker->name,
        ];
    }
}
