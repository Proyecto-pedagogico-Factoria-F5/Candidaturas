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
			'phone' => $this->faker->name,
			'job' => $this->faker->name,
			'role_id' => $this->faker->name,
			'escuela_id' => $this->faker->name,
			'promo' => $this->faker->name,
			'image' => $this->faker->name,
        ];
    }
}
