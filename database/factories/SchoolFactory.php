<?php

namespace Database\Factories;

use App\Models\School;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SchoolFactory extends Factory
{
    protected $model = School::class;

    public function definition()
    {
        return [
			'nombre_escuela' => $this->faker->name,
			'provincia' => $this->faker->name,
			'imagen' => $this->faker->name,
        ];
    }
}
