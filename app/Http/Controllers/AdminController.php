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
        return view('admins.indexGerentes', compact('gerentes'));
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
        return view('admins.editUsers', compact('gerentes', 'user'));
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
        return view('admins.showUsers', compact('user'));
    }
    public function store(Request $request){
        
        $imagemPath = $request->file('photo')->store('photos', 'public');

        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'endereço' => $request->endereço,
            'cpf' => $request->cpf,
            'telefone' => $request->telefone,
            'nascimento' => $request->nascimento,
            'photo' => $imagemPath

        ]);
        
        
        return redirect()->route('admins.administradores.index');
    }

    public function storeGerentes(Request $request){
        $imagemPath = $request->file('photo')->store('photos', 'public');
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
            'photo' => $imagemPath

        ]);
        return redirect()->route('admins.gerentes.index');
}

public function storeUsuarios(Request $request){
    if ($request->hasFile('photo')) {
        $imagePath = $request->file('photo')->store('photos', 'public');
    } else {
        $imagePath = null;
    }
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
        'gerente_id' => $request->gerente_id,
        'photo' => $imagemPath
        

    ]);
    return redirect()->route('admins.users.index');
}

    function update(Request $request, Admin $admin){
        $data = $request->all();
        $admin->update($data);
        if ($request->hasFile('photo')) {
            if ($user->photo && Storage::exists('public/' . $user->photo)) {
                Storage::delete('public/' . $user->photo);
            }
            $imagePath = $request->file('photo')->store('photo', 'public');
            $user->photo = $imagePath; 
        }
        $user->save();
        return redirect()->route('admins.administradores.index');
}
    function updateGerentes(Request $request, Gerente $gerente){
        
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
function updateUsuarios(Request $request, User $user){
     
    
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
    function destroy(Admin $admin){
        $admin->delete();
        return redirect()->route('admins.administradores.index');
    }
    
    function destroyUsuarios(User $user){
        $conta = Conta::where('id', $user->conta_id);
        $user->delete();
        $conta->delete();

        return redirect()->route('admins.users.index');
    }
    function destroyGerentes(Gerente $gerente){
        $conta = Conta::where('id', $gerente->conta_id);
        $gerente->delete();
        $conta->delete();

        return redirect()->route('admins.gerentes.index');
    }
}