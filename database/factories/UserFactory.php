<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Type;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
        /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
   
    public function definition(): array
    {

        return [
            'id' => $this->faker->unique()->numberBetween(10000000, 99999999) . strtoupper( $this->faker->randomLetter),
            'name' => $this->faker->firstName(),
            'lastname' => $this->faker->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    public function configure() {
        return $this->afterCreating(function (User $user) {
            $user->types()->attach(
                Type::all()->random(rand(1, 2))->pluck('id')->toArray()
            );
        });
    }
      /**
     * Indicate that the model's email address should be unverified.
     *
     * @return $this
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}