<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create()
    {
        if(Auth::guard('admin')->check())
        return redirect()->route('dashboard.admin');
        if(Auth::guard('gerente')->check())
        return redirect()->route('dashboard.gerente');
        if(Auth::guard('web')->check())
        return redirect()->route('dashboard');

        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse //faremos aqui oq acontece apos o login
    {
        //$request->authenticate();

        //$request->session()->regenerate();

        //return redirect()->intended(route('dashboard', absolute: false));
        $credentials = $request->only('email', 'password');
        if(Auth::guard('web')->attempt($credentials)){
            return redirect()->route('dashboard');
        } else if(Auth::guard('gerente')->attempt($credentials)){
            return redirect()->route('dashboard.gerente');
        } else if(Auth::guard('admin')->attempt($credentials)){
            return redirect()->route('dashboard.admin');
        }
        
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(): RedirectResponse
    {
        if(Auth::guard('web')->check()){
        Auth::guard('web')->logout();
        } 
        if(Auth::guard('admin')->check()){
            Auth::guard('admin')->logout();
            } 
            if(Auth::guard('gerente')->check()){
                Auth::guard('gerente')->logout();
                } 



        return redirect('/login');
    }
}
