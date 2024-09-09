<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Conta;
use App\Models\Gerente;
use App\Models\User;

class ExtratoController extends Controller
{
    public function indexGerentes(){
       
        $gerente = Auth::guard('gerente')->user();
        $conta = Conta::where('id', $gerente->conta_id);
        $saldoAtual = $conta->saldo;

        // Pega as 10 últimas transações envolvendo o usuário logado
        $transferencias = Transferencia::where('remetente_id', $conta->id)
            ->orWhere('destinatario_id', $conta->id)
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        return view('gerentes.extrato', compact('transferencias', 'saldoAtual'));

    }
    public function indexUsuarios(){
       
        $user = Auth::guard('web')->user();
        $conta = Conta::where('id', $user->conta_id);
        $saldoAtual = $conta->saldo;

        // Pega as 10 últimas transações envolvendo o usuário logado
        $transferencias = Transferencia::where('remetente_id', $conta->id)
            ->orWhere('destinatario_id', $conta->id)
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        return view('users.extrato', compact('transferencias', 'saldoAtual'));

    }
}
