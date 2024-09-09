<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        return view('admins.contact');
    }
    public function store(){
        $users = User::all();
        $gerentes = Gerente::all();
        $admins = Admin::all();
        switch($request->destinatario){
            case 'gerentes':
                foreach($gerentes as $gerente){
                    Mail::to($gerente->email)->send(new Contact([
                        'fromEmail' => Auth::guard('admin')->user()->email,
                        'subject' => $request->subject
                    ]));
                }
            case 'usuarios':
                foreach($uses as $user){
                    Mail::to($user->email)->send(new Contact([
                        'fromEmail' => Auth::guard('admin')->user()->email,
                        'subject' => $request->subject
                    ]));
                }
            case 'administradores':
                foreach($admins as $admin){
                    Mail::to($admin->email)->send(new Contact([
                        'fromEmail' => Auth::guard('admin')->user()->email,
                        'subject' => $request->subject
                    ]));
                }
                break;
        }
        


        
    }
}
