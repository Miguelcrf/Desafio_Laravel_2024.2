<?php

use App\Models\Conta;
use Faker\Factory;

if(!function_exists('gerarNumero')){
    function gerarNumero(){
        $faker = \Faker\Factory::create();
        $numero = $faker->numerify('######');
        $contas = Conta::all();
        foreach($contas as $conta){
            if($conta->numero == $numero)
            $numero = gerarNumero();
        }
        return $numero;
    }
    
}