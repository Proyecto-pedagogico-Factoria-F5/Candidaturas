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
			'name' => $this->faker->name,
			'surnames' => $this->faker->name,
			'birth_date' => $this->faker->name,
			'nationality' => $this->faker->name,
			'email' => $this->faker->name,
			'phone' => $this->faker->name,
			'register_date' => $this->faker->name,
			'user_account' => $this->faker->name,
			'points' => $this->faker->name,
			'description' => $this->faker->name,
			'selected' => $this->faker->name,
			'github' => $this->faker->name,
        ];
    }
}
