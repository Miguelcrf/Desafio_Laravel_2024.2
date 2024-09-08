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
    public function show(User $user){
        $gerentes = Gerente::all();
        return view('users.show', compact('user', 'gerentes'));
    }
    
}
