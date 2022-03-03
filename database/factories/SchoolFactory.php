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
			'name' => $this->faker->name,
			'location' => $this->faker->name,
            'image' => $this->faker->image('https://picsum.photos/400/300'),
        ];
    }
}
