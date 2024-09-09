<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Conta;
use App\Models\Emprestimos;

class EmprestimoController extends Controller
{
    public function indexGerentes()
    {
        
            $conta = Conta::where('id', Auth::guard('gerente')->user()->id);
        
        
        $emprestimoAtivo = Emprestimo::where('conta_id', $conta->id)
            ->whereIn('status', ['não pago'])
            ->first();

        return view('gerentes.emprestimos', compact('emprestimoAtivo'));
    }
    public function indexUsuarios()
    {
        
            $conta = Conta::where('id', Auth::guard('web')->user()->id);
        
        
        $emprestimoAtivo = Emprestimo::where('conta_id', $conta->id)
            ->whereIn('status', ['não pago'])
            ->first();

        return view('users.emprestimos', compact('emprestimoAtivo'));
    }



    public function solicitarGerentes(Request $request)
    {
       $gerente = Auth::guard('gerente')->user();
       $conta = Conta::where('id', $gerente->conta_id);

       if($request->valor > $conta->saldo){
        return redirect()->back()->with('erro', 'saldo da conta é insuficiente!');
       }

        Emprestimo::create([
            'conta_id' => $conta->id,
            'valor' => $request->valor,
            'status' => 'nao_pago',
        ]);

        return redirect()->route('gerentes.emprestimos')->with('success', 'Empréstimo solicitado com sucesso!');
    }
    
    
    
    public function solicitarUsuarios(Request $request)
    {
       $user = Auth::guard('web')->user();
       $conta = Conta::where('id', $user->conta_id);

       if($request->valor > $conta->saldo){
        return redirect()->back()->with('erro', 'saldo da conta é insuficiente!');
       }

        Emprestimo::create([
            'conta_id' => $conta->id,
            'valor' => $request->valor,
            'status' => 'pendente',
        ]);

        return redirect()->route('gerentes.emprestimos')->with('success', 'Empréstimo solicitado com sucesso!');
    }


    public function pagar(Emprestimos $emprestimo)
    {
        $conta = Conta::where('id', $emprestimo->usuario_id);
        if($emprestimo->valor > $conta->saldo){
            return redirect()->back()->with('erro', 'saldo da conta é insuficiente!');
           }
        $conta->saldo -= $emprestimo->valor;
        $conta->save();
        $emprestimo->status = 'pago';
        $emprestimo->save();

        return redirect()->route('emprestimos.index')->with('success', 'Empréstimo pago com sucesso!');
    }
}

