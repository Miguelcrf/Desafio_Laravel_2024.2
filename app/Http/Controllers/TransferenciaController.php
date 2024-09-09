<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Conta;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class TransferenciaController extends Controller
{
    public function index()
    {
        return view('transferencias.index');
    }
 
    public function transferir(Request $request)
    {
        if(Auth::guard('gerente')->check()){
        $remetente = Auth::guard('gerente')->user();
        }
        if(Auth::guard('web')->check()){
            $remetente = Auth::guard('web')->user();
            }
        $contaRemetente = Conta::where('id', $remetente->conta_id);
        $agencia = $request->agencia;
        $numero = $request->numero;
        $valor = $request->valor;
        $senha = $request->senha;
        $destinatario;
        
       $contaDestinatario = Conta::where('agencia', $agencia)
       ->where('numero', $numero)
       ->first();
       if(!$contaDestinatario)
       return redirect()->back()->with('erro', 'conta inexistente');
    if($senha != $contaRemetente->password)
    return redirect()->back()->with('erro', 'senha incorreta!'); 
        if($valor > $contaRemetente->saldo)
        return redirect()->back()->with('erro', 'saldo insuficiente!');
        
        
            $destinatario = User::where('conta_id', $contaDestinatario->id);
            if(!$destinatario){
                $destinatario = Gerente::where('conta_id', $contaDestinatario->id);
            }
            if($request->valor > $contaRemetente->limite){
                
                if(Auth::guard('web')->check()){
                    $gerenteResponsavel = Gerente::where('id', Auth::guard('web')->user()->gerente_id);
                    return redirect()->back()->with('erro', 'limite de transferencia ultrapassado. Por favor entre em contato com 
                    seu gerente pelo telefone (<?= $gerenteResponsavel->telefone?>) ou pelo email (
                    <?= $gerenteResponsavel->email ?> ) ');
                }
                Pendencias::create([
                    'titulo' => 'limite de transferencia ultrapassado',
                    'valor' => $request->valor,
                    'conta_id' => $contaRemetente
                    
                ]);
            }
            else{
            $contaRemetente->saldo -= $request->valor;
            $contaRemetente->save();

            $contaDestinatario->saldo += $request->valor;
            $contaDestinatario->save();
            
            Transfer::create([
                'remetente_id' => $contaRemetente->id,
                'destinatario_id' => $contaDestinatario->id,
                'valor' => $valor,
            ]);
        }

        return redirect()->route('transferencias.index');
        
    }
}


