<?php
use App\Models\Conta;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

if(!function_exists('verificaDeposito')){
    function verificaDeposito(Conta $conta, Request $request){
        

        if( $request->senha != $conta->password || 
        !Hash::check($request->password, Auth::guard('gerente')->user()->first()->password)

        ){
        return false;
        }
        return true;

    }
    
}