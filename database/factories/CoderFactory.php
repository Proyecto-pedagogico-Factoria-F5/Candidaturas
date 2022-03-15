<?php

namespace Database\Factories;

use App\Models\Coder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CoderFactory extends Factory
{
    protected $model = Coder::class;

    public function definition()
    {
        return [
			'nombre' => $this->faker->name,
			'apellidos' => $this->faker->name,
			'email' => $this->faker->name,
			'teléfono' => $this->faker->name,
			'fecha_de_nacimiento' => $this->faker->name,
			'github' => $this->faker->name,
			'promo_id' => $this->faker->name,
        ];
    }
}
