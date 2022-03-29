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
			'name' => $this->faker->name,
			'surnames' => $this->faker->name,
			'email' => $this->faker->name,
			'password' => $this->faker->name,
			'job' => $this->faker->name,
			'github' => $this->faker->name,
			'birth_date' => $this->faker->name,
			'image' => $this->faker->name,
        ];
    }
}
