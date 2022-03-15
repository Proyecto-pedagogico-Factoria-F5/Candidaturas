<?php

namespace Database\Factories;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProfileFactory extends Factory
{
    protected $model = Profile::class;

    public function definition()
    {
        return [
			'nombre' => $this->faker->name,
			'email' => $this->faker->name,
			'password' => $this->faker->name,
			'teléfono' => $this->faker->name,
			'puesto' => $this->faker->name,
			'role' => $this->faker->name,
			'escuela' => $this->faker->name,
			'promo' => $this->faker->name,
			'imagen' => $this->faker->name,
        ];
    }
}
