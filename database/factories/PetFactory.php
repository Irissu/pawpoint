<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pet>
 */
class PetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName(),
            'breed' => $this->faker->word(),
            'weight' => $this->faker->randomFloat(2, 0.1, 50), // genera numero de 2 decimales, valor minimo 0.1 y maximo 50
            'type' => $this->faker->randomElement(['dog', 'cat']),
            'age' => $this->faker->randomNumber(1, 40),
            
            'user_id' => User::whereHas('types', function ($query) {
              $query->where('type_id', 1);
            })->get()->random()->id
          ];
    }
}
