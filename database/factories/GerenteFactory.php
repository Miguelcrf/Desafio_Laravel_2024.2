<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use App\Models\Conta;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gerente>
 */
class GerenteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $conta = Conta::factory()->create();
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'password' => Hash::make('password'),
            'endereço' => $this->faker->address(),
            'telefone' => $this->faker->phoneNumber(),
            'nascimento' => $this->faker->date(),
            'cpf' => fake()->numerify('###.###.###-##'),
            'conta_id' => $conta->id,
            'photo' =>fake()->imageUrl(360, 360, 'profile', true)
        ];
    }
}
