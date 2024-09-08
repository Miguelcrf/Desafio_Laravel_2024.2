<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
   public function storeDepositos(){
      
   }
}
