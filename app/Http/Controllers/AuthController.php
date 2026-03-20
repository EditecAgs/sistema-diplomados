<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request){
        $errorcode = $request->query('errorcode');
        $wantsurl  = $request->query('wantsurl');

        return view('login.index', compact('errorcode', 'wantsurl'));
    }
}
