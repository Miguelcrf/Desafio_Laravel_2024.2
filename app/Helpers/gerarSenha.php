<?php

use App\Models\Conta;
use \Faker\Factory;

if(!function_exists('gerarSenha')){
    function gerarSenha(){
        $faker = \Faker\Factory::create();
        $senha = $faker->numerify('######');
        $contas = Conta::all();
        foreach($contas as $conta){
            if($conta->senha == $senha)
            $senha = gerarSenha();
        }
        return $senha;
    }
    
}