<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransferenciaController extends Controller
{
    public function index()
    {
        return view('transferencias.index');
    }

    public function transferir(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'nome_destinatario' => 'required|string|max:255',
            'conta_destinatario' => 'required|numeric',
            'valor' => 'required|numeric|min:0.01',
            'descricao' => 'nullable|string|max:500',
        ]);

        // Lógica de processamento da transferência

        return redirect()->route('transferencia.form')->with('success', 'Transferência realizada com sucesso!');
    }
}

