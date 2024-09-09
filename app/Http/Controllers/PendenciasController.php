<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Emprestimos;

class PendenciasController extends Controller
{
    public function index()
    {
        
        $gerente = Auth::guard('gerentes')->user();
        $users = User::where('gerente_id', $gerente->id);
        foreach($users as $user){
                $conta = Conta::where('id', $user->conta_id);
        $pendencias = Emprestimos::where('conta_id', $conta->id)
                        ->where('status', 'pendente')
                        ->get();
            }
            return view('gerentes.pendencias', compact('pendencias', 'users'));
        }
       
    }

