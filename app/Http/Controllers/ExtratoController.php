<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Conta;
use App\Models\Gerente;
use App\Models\User;
use PDF;
use Carbon\Carbon;

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

        //10 últimas transações 
        $transferencias = Transferencia::where('remetente_id', $conta->id)
            ->orWhere('destinatario_id', $conta->id)
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        return view('users.extrato', compact('transferencias', 'saldoAtual'));

    }
    public function gerarRelatorio(Request $request)
    {
        if(Auth::guard('web')->check()){
        $usuarioLogado = Auth::guard('web')->user();
        }
        if(Auth::guard('gerente')->check()){
        $usuarioLogado = Auth::guard('gerente')->user();
        }
        
        $conta = Conta::where('id', $usuarioLogado->conta_id);
        
        $filtro = $request->filtro;
        $dataAtual = Carbon::now();

        // Filtrar transações 
        switch ($filtro) {
            case 'mes':
                $dataInicio = Carbon::now()->startOfMonth();
                break;
            case '3meses':
                $dataInicio = Carbon::now()->subMonths(3);
                break;
            case '6meses':
                $dataInicio = Carbon::now()->subMonths(6);
                break;
            default:
                $dataInicio = Carbon::now()->startOfMonth();
                break;
        }

        // Filtrar transferencias
        $transferencias = Transferencia::where(function ($query) use ($conta) {
            $query->where('remetente_id', $conta->id)
                  ->orWhere('destinatario_id', $conta->id); // aqui pega todas as transfs em que o usuario logado esteve envolvido 
        })
        ->where('created_at', '>=', $dataInicio) // aqui filtra quando a data de criação é superior a data filtrada
        ->orderBy('created_at', 'desc') // ordena descrescentemente as transações
        ->get();
        $contaOutra = Conta::all();
        
        if($transferencias->remetente_id == $conta->id){
            $remetente = $usuarioLogado->name;
            $destinatario = $transferencias->destinatario_id;
            
        }else{
            $remetente = $transferencias->remetente_id;
            $destinatario = $usuarioLogado->name;
        }


        $pdf = PDF::loadView('transferencias.relatorios', [
            'transferencias' => $transferencias,
            'user' => $user,
            'dataAtual' => $dataAtual,
            'filtro' => $filtro,
            'remetente' => $remetente,
            'destinatario' => $destinatario
        ]);

        return $pdf->download('relatorio-transferencias.pdf');
    }
}
