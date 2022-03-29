<?php

namespace Database\Factories;

use App\Models\Promo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PromoFactory extends Factory
{
    protected $model = Promo::class;

    public function definition()
    {
        return [
			'school_id' => $this->faker->name,
			'name' => $this->faker->name,
			'ubication' => $this->faker->name,
			'start_date' => $this->faker->name,
			'duration' => $this->faker->name,
			'image' => $this->faker->name,
			'url' => $this->faker->name,
			'code' => $this->faker->name,
        ];
    }
}


// 'imagen' => 'https://picsum.photos/400/300',