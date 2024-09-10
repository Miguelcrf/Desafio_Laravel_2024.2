<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Gerente;
class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('users.index', compact('users'));
    }
    public function edit(User $user){
        return view('users.edit', compact('user'));
    }
    public function create(){
      
      $user = new User();
      return view('users.create', compact('user'));
      
    }
    public function update(){
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

    public function show(User $user){
        $gerentes = Gerente::all();
        return view('users.show', compact('user', 'gerentes'));
    }

    public function delete(User $user){
        $conta = Conta::where('id', $user->conta_id);
        $user->delete();
        $conta->delete();
    
        return redirect()->route('users.index');
    }
    
}
