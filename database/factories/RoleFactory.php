<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Role>
 */
class RoleFactory extends Factory
{

    protected $model = Promo::class;
    public function definition()
    {
        return [
            'nombre_promo' => $this->faker->name,
        ];
    }
}
