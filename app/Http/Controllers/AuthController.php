<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function login(Request $request){
        $errorcode = $request->query('errorcode');
        $wantsurl  = $request->query('wantsurl');
        return view('login.index', compact('errorcode', 'wantsurl'));
    }

    public function showLogin(){
        return view('admin.auth.login');
    }

    public function login_admin(Request $request){
         $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->has('remember'))) {
            $request->session()->regenerate();
            
            return redirect()->intended('/admin/graduates/asics')
                ->with('success', 'Bienvenido ' . Auth::user()->name);
        }

        return back()->with('error', 'Las credenciales no coinciden con nuestros registros. Por favor, verifica tu correo y contraseña.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/admin/login')->with('success', 'Has cerrado sesión exitosamente.');
    }
}
