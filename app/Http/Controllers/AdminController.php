<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Gerente;
use App\Models\Admin;
use App\Models\Conta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function indexUsers(){
        $users = User::all();
        return view('admins.indexUsers', compact('users'));
    }
    public function indexGerentes(){
        $gerentes = Gerente::all();
        $users = User::all();
        return view('admins.indexGerentes', compact('gerentes'), compact('users'));
    }
    public function indexAdmins(){
        $admins = Admin::all();
        return view('admins.indexAdmins', compact('admins'));
    }

    public function edit(Admin $admin){
        return view('admins.edit', compact('admin'));
    }
    public function editUsuarios(User $user){
        $gerentes = Gerente::all();
        return view('admins.editUsers', compact('gerentes'), compact('user'));
    }
    public function editGerentes(Gerente $gerente){
        return view('admins.editGerentes', compact('gerente'));
    }
    public function create(){
        return view('admins.create');
    }
    public function createGerentes(){
        return view('admins.createGerentes');
    }
    public function createUsuarios(){
        $gerentes = Gerente::all();
        return view('admins.createUsers', compact('gerentes'));
    }

    public function show(Admin $admin){
        return view('admins.show', compact('admin'));
    }
    public function showGerentes(Gerente $gerente){
        return view('admins.showGerentes', compact('gerente'));
    }
    public function showUsuarios(User $user){
        return view('admins.showUsers');
    }
    public function store(Request $request){
        
        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'endereço' => $request->endereço,
            'cpf' => $request->cpf,
            'telefone' => $request->telefone,
            'nascimento' => $request->nascimento

        ]);
        
        
        return redirect()->route('users.index');
    }

    public function storeGerentes(Request $request){
        $conta = Conta::create([
            'numero' => gerarNumero(),
            'agencia' => gerarAgencia(),
            'password' => gerarSenha(),
            'saldo' => 0,
            'limite' => 1000
        ]);
           
        Gerente::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'endereço' => $request->endereço,
            'cpf' => $request->cpf,
            'telefone' => $request->telefone,
            'nascimento' => $request->nascimento,
            'conta_id' => $conta->id,

        ]);
        return redirect()->route('admins.gerentes.index');
}
public function storeUsuarios(Request $request){
    $conta = Conta::create([
        'numero' => gerarNumero(),
        'agencia' => gerarAgencia(),
        'password' => gerarSenha(),
        'saldo' => 0,
        'limite' => 1000
    ]);
       
    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->password,
        'endereço' => $request->endereço,
        'cpf' => $request->cpf,
        'telefone' => $request->telefone,
        'nascimento' => $request->nascimento,
        'conta_id' => $conta->id,
        

    ]);
    return redirect()->route('users.index');
}
}
