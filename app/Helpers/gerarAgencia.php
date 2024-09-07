<?php

use App\Models\Conta;
use Faker\Factory;

if(!function_exists('gerarAgencia')){
    function gerarAgencia(){
        $faker = \Faker\Factory::create();
        $agencia = $faker->numerify('#####');
        $contas = Conta::all();
        foreach($contas as $conta){
            if($conta->agencia == $agencia)
            $agencia = gerarAgencia();
        }
        return $agencia;
    }
   
}