<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gerente;
use App\Models\User;
use App\Models\Conta;

class GerentesController extends Controller
{
    public function index(){
        $gerentes = Gerente::all();
        return view('gerentes.index', compact('gerentes'));
    }
    public function indexUsers(){
        $gerentes = Gerente::all();
        $users = User::all();
        return view('gerentes.indexUsers', compact('gerentes'), compact('users'));
    }
    public function editUsers(){
        return view('gerentes.editUsers');
    }
    public function createUsers(){
        return view('gerentes.create');
    }
    public function edit(){
        return view('gerentes.edit');
    }
    public function store(Request $request){
        $conta = Conta::create([
            
        ]);

        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'endereço' => $request->endereço,
            'cpf' => $request->cpf,
            'telefone' => $request->telefone,
            'nascimento' => $request->nascimento

        ]);
}
}