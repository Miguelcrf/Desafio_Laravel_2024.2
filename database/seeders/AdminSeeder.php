<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table("admins")->insert([
        'name' => 'Miguel Oliveira',
        'email' => 'miguel.oliveira@codejr.com.br',
        'password' => Hash::make('051104'),
        'endereço' => 'Rua Rosa Sffeir',
        'telefone' => '(32) 98708 3438',
        'nascimento'=> '2004/11/05',
        'cpf' => '12345678910'
       ]);
    }
}
