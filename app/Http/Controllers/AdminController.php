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
    public function indexAdmins(){
        $admins = Admin::all();
        return view('admins.indexAdmins', compact('admins'));
    }

    public function edit(){
        return view('admins.edit');
    }
    public function editUsers(){
        return view('admins.editUsers');
    }
    public function editGerentes(){
        return view('admins.editGerentes');
    }
    public function create(){
        return view('admins.create');
    }
    public function createGerentes(){
        return view('admins.createGerentes');
    }
    public function createUsers(){
        return view('admins.createUsers');
    }

    public function show(User $user){
        return view('users.show');
    }
    public function store(Request $request){
        $data = $request->all();
        $data->gerente_id = 1;
        dd($data);
        User::create($data);
        return redirect()->route('users.index');
    }
}
