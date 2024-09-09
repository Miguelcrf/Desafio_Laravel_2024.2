<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Conta;

class SaqueController extends Controller
{
   public function index(){
    return view('saques.index');
   }
   public function indexSaques(){
      return view('saques.indexSaques');
   }
   public function indexDepositos(){
      return view('saques.indexDepositos');
   }
   public function storeDepositos(Request $request){
      $conta = Conta::where('numero', $request->numero)
      ->where('agencia', $request->agencia)
      ->first();

      if(!$conta){
         return redirect()->back()->with('erro', 'conta inexistente!');
      }else if(!verificaDeposito($conta, $request)){
         return redirect()->back()->with('erro', 'dados invalidos');
      }
      
      $conta->saldo += $request->valor;
      $conta->save();

      return redirect()->route('dashboard');

   }


   public function storeSaques(Request $request){
      $conta = Conta::where('numero', $request->numero)
      ->where('agencia', $request->agencia)
      ->first();

      if(!$conta){
         return redirect()->back()->with('erro', 'conta inexistente!');
      }else if(!verificaDeposito($conta, $request)){
         return redirect()->back()->with('erro', 'dados invalidos');
      } else if($conta->saldo < $request->valor){
         return redirect()->back()->with('erro', 'saldo da conta é insuficiente!');
      }
      
      $conta->saldo -= $request->valor;
      $conta->save();

      return redirect()->route('dashboard');

   }
}
