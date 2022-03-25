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
			'nombre_promo' => $this->faker->name,
			'location' => $this->faker->name,
			'escuela_id' => $this->faker->name,
			'fecha_de_inicio' => $this->faker->name,
			'duration' => $this->faker->name,
			'url' => $this->faker->name,
			'image' => $this->faker->name,
			'code' => $this->faker->name,
        ];
    }
}


// 'imagen' => 'https://picsum.photos/400/300',