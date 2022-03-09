<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RoleFactory extends Factory
{
    protected $model = Role::class;

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
