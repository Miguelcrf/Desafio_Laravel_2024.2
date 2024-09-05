<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Conta>
 */
class ContaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'agencia' => fake()->numerify('####-#'),
            'numero' => fake()->numerify('#####'),
            'saldo' => '0',
            'limite' => '1000',
            'password' => fake()->numerify('######'),

        ];
    }
}
