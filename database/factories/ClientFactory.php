<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombres' => fake()->name(),
            'apellidos' => fake()->unique()->safeEmail(),
            'fechaDeNacimiento' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'cuit' => $this->faker->numberBetween(20000000005, 29000000009),
            'domicilio' => $this->faker->address(),
            'telefono' => $this->faker->phoneNumber(),
            'email' => fake()->unique()->safeEmail(),
        ];
    }
}
