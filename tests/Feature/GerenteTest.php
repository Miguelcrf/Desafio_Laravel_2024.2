<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Gerente;

class GerenteTest extends TestCase
{
    public function test_create_gerente_users() //este teste precisa falhar
    {
        $user = User::factory()->create(); 
        $this->actingAs($user); //usuario logado
        $conta = Conta::factory()->create();
        $data = [
            'name' => 'Gerente Teste',
            'email' => 'gerente@teste.com',
            'password' => bcrypt('password123'),
            'endereço' => $this->faker->address(),
            'telefone' => $this->faker->phoneNumber(),
            'nascimento' => $this->faker->date(),
            'cpf' => fake()->numerify('###.###.###-##'),
            'conta_id' => $conta->id,
            'photo' =>fake()->imageUrl(360, 360, 'profile', true)
        ];

        $response = $this->post(route('gerentes.store'), $data);//falha

        $response->assertStatus(201); // Verifica se foi criado com sucesso
        $this->assertDatabaseHas('gerentes', ['email' => 'gerente@teste.com']);//falha
    }
    public function test_read_gerente_users() //este teste precisa falhar
{
    $user = User::factory()->create();
    $this->actingAs($user);

    $gerente = Gerente::factory()->create();

    $response = $this->get(route('gerentes.show', $gerente->id));

    $response->assertStatus(200); //falha
    $response->assertJson([//falha
        'name' => $gerente->name,
        'email' => $gerente->email, //verifica compatibilidade de variaveis
    ]);
}
public function test_update_gerente_users()//este teste precisa falhar
{
    $user = User::factory()->create();
    $this->actingAs($user);

    $gerente = Gerente::factory()->create();

    $data = [
        'name' => 'Gerente Atualizado',
        'email' => 'gerenteatualizado@teste.com',
    ];

    $response = $this->put(route('gerentes.update', $gerente->id), $data);

    $response->assertStatus(200); //falha
    $this->assertDatabaseHas('gerentes', ['email' => 'gerenteatualizado@teste.com']); //falha
}
public function test_delete_gerente_users() //este teste precisa falhar
{
    $user = User::factory()->create();
    $this->actingAs($user);

    $gerente = Gerente::factory()->create();

    $response = $this->post(route('gerentes.delete', $gerente->id));

    $response->assertStatus(200); // falha
    $this->assertDatabaseMissing('gerentes', ['id' => $gerente->id]); //falha
}



public function test_create_gerente_gerentes() //este teste precisa falhar
    {
        $gerente = Gerente::factory()->create(); 
        $this->actingAs($gerente); 
        $conta = Conta::factory()->create();
        $data = [
            'name' => 'Gerente Teste',
            'email' => 'gerente@teste.com',
            'password' => bcrypt('password123'),
            'endereço' => $this->faker->address(),
            'telefone' => $this->faker->phoneNumber(),
            'nascimento' => $this->faker->date(),
            'cpf' => fake()->numerify('###.###.###-##'),
            'conta_id' => $conta->id,
            'photo' =>fake()->imageUrl(360, 360, 'profile', true)
        ];

        $response = $this->post(route('gerentes.store'), $data);//falha

        $response->assertStatus(201); //falha
        $this->assertDatabaseHas('gerentes', ['email' => 'gerente@teste.com']); //falha
    }

    public function test_read_gerente_gerentes() //este teste precisa falhar
{
    $gerente = Gerente::factory()->create();
    $this->actingAs($gerente);

    

    $response = $this->get(route('gerentes.show', $gerente->id));

    $response->assertStatus(200); //falhar
    $response->assertJson([//falhar
        'name' => $gerente->name,
        'email' => $gerente->email, 
    ]);
}
public function test_update_gerente_gerentes()//este teste precisa falhar
{
    $gerente = Gerente::factory()->create();
    $this->actingAs($gerente);

    

    $data = [
        'name' => 'Gerente Atualizado',
        'email' => 'gerenteatualizado@teste.com',
    ];

    $response = $this->put(route('gerentes.update', $gerente->id), $data);

    $response->assertStatus(200); //falhar
    $this->assertDatabaseHas('gerentes', ['email' => 'gerenteatualizado@teste.com']); //falhar
}
public function test_delete_gerente_gerentes() //este teste precisa falhar
{
    $gerente = Gerente::factory()->create();
    $this->actingAs($gerente);

   

    $response = $this->post(route('gerentes.delete', $gerente->id));

    $response->assertStatus(200); // falha
    $this->assertDatabaseMissing('gerentes', ['id' => $gerente->id]); //falha
}


public function test_create_gerente_admins() //este teste precisa funcionar
    {
        $admin = Admin::factory()->create(); 
        $this->actingAs($admin); 
        $gerente = Gerente::factory()->create();
        $conta = Conta::factory()->create();
        $data = [
            'name' => 'Gerente Teste',
            'email' => 'gerente@teste.com',
            'password' => bcrypt('password123'),
            'endereço' => $this->faker->address(),
            'telefone' => $this->faker->phoneNumber(),
            'nascimento' => $this->faker->date(),
            'cpf' => fake()->numerify('###.###.###-##'),
            'conta_id' => $conta->id,
            'photo' =>fake()->imageUrl(360, 360, 'profile', true)
        ];

        $response = $this->post(route('gerentes.store'), $data);

        $response->assertStatus(201); //sucesso
        $this->assertDatabaseHas('gerentes', ['email' => 'gerente@teste.com']); //sucesso
    }
    public function test_read_gerente_admins() //este teste precisa funcionar
{
    $admin = Admin::factory()->create();
    $this->actingAs($admin);
    $gerente = Gerente::factory()->create();
    

    $response = $this->get(route('gerentes.show', $gerente->id));

    $response->assertStatus(200); //funcionar
    $response->assertJson([//funcionar
        'name' => $admin->name,
        'email' => $admin->email, 
    ]);
}
public function test_update_gerente_admins()//este teste precisa funcionar
{
    $admin = Admin::factory()->create();
    $this->actingAs($admin);

    $gerente = Gerente::factory()->create();

    $data = [
        'name' => 'Gerente Atualizado',
        'email' => 'gerenteatualizado@teste.com',
    ];

    $response = $this->put(route('gerentes.update', $gerente->id), $data);

    $response->assertStatus(200); //funcionar
    $this->assertDatabaseHas('gerentes', ['email' => 'gerenteatualizado@teste.com']); //funcionar
}
public function test_delete_gerente_admins() //este teste precisa funcionar
{
    $admin = Admin::factory()->create();
    $this->actingAs($admin);
    $gerente = Gerente::factory()->create();

   

    $response = $this->post(route('gerentes.delete', $gerente->id));

    $response->assertStatus(200); // funcionar
    $this->assertDatabaseMissing('gerentes', ['id' => $gerente->id]); //funcionar
}
}

