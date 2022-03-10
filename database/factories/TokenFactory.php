<?php

namespace Database\Factories;

use App\Models\Token;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Token>
 */
class TokenFactory extends Factory
{
    
    protected $model = Token::class;
     
     
     
    public function definition()
    {
        return [
            
                'token_typeform' => $this->faker->name,
        ];
    }
}
