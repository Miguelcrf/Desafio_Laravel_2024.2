<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Gerente;
use App\Models\Admin;
use Illuminate\Http\Request;

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

    public function edit(User $user){
        return view('users.edit', compact('user'));
    }
    public function create(){
      
      $user = new User();
      return view('users.create', compact('user'));
      
    }
    public function show(User $user){
        return view('users.show', compact('user'));
    }
    public function store(Request $request){
        $data = $request->all();
        $data->gerente_id = 1;
        dd($data);
        User::create($data);
        return redirect()->route('users.index');
    }
}
