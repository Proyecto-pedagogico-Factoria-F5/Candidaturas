<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Role>
 */
class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name,
			'email' => $this->faker->name,
			'teléfono' => $this->faker->name,
			'puesto' => $this->faker->name,
			'escuela' => $this->faker->name,
			'promo' => $this->faker->name,
			'imagen' => $this->faker->name,
        ];
    }
}
