<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gerente;
use App\Models\User;
use App\Models\Conta;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class GerentesController extends Controller
{
    public function index(){
        $gerentes = Gerente::all();
        return view('gerentes.index', compact('gerentes'));
    }
    public function indexUsers(){
        $gerentes = Gerente::all();
        $users = User::all();
        return view('gerentes.indexUsers', compact('gerentes', 'users'));
    }
    public function editUsers(User $user){
        $gerentes = Gerente::all();
        return view('gerentes.editUsers', compact('user', 'gerentes'));
    }
    public function createUsers(){
        return view('gerentes.create');
    }
    public function edit(Gerente $gerente){
        return view('gerentes.edit', compact('gerente'));
    }

    public function store(Request $request){
        $conta = Conta::create([
            'numero' => gerarNumero(),
            'agencia' => gerarAgencia(),
            'password' => gerarSenha(),
            'saldo' => 0,
            'limite' => 1000
        ]);
        $gerente = Auth::guard('gerente')->user();

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'endereço' => $request->endereço,
            'cpf' => $request->cpf,
            'telefone' => $request->telefone,
            'nascimento' => $request->nascimento,
            'gerente_id' => $gerente->id,
            'conta_id' => $conta->id

        ]);
        return redirect()->Route('gerentes.users.index');
}

public function update(Request $request, Gerente $gerente){
    $data = $request->all();
    $gerente->update($data);
    if ($request->hasFile('photo')) {
        if ($user->photo && Storage::exists('public/' . $user->photo)) {
            Storage::delete('public/' . $user->photo);
        }
        $imagePath = $request->file('photo')->store('photo', 'public');
        $user->photo = $imagePath; 
    }
    $user->save();
    return redirect()->route('admins.gerentes.index')->with('sucess', true);
}

public function updateUsers(Request $request, User $user){
    $data = $request->all();
    $user->update($data);

       if ($request->hasFile('photo')) {
        if ($user->photo && Storage::exists('public/' . $user->photo)) {
            Storage::delete('public/' . $user->photo);
        }
        $imagePath = $request->file('photo')->store('photo', 'public');
        $user->photo = $imagePath; 
    }
    $user->save();
    return redirect()->route('admins.usuarios.index')->with('sucess', true);
}


public function showUsers(User $user){
    return view('gerentes.showUsers', compact('user'));
}
public function show(Gerente $gerente){
    return view('gerentes.show', compact('gerente'));
}
}