<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admins>
 */
class AdminFactory extends Factory
{
    protected $model = Admin::class;
    public function definition()
    {
        return [
            'regional' => $this->faker->name,
			'provincial' => $this->faker->name,
			'local' => $this->faker->name,
        ];
    }
}
