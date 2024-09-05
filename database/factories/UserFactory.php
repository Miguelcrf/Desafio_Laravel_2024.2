<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
Use App\Models\Conta;
Use App\Models\Gerente;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $gerente = Gerente::pluck('id')->toArray();
        $conta = Conta::factory()->create();
        
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'endereço' => $this->faker->address(),
            'telefone' => $this->faker->phoneNumber(),
            'nascimento' => $this->faker->date(),
            'cpf' => fake()->numerify('###.###.###-##'),
            'gerente_id' => fake()->randomElement($gerente),
            'conta_id' => $conta->id


        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
