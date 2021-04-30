<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function authenticate(Request $request) {

        if(Auth::attempt([
                'username' => $request->input('username'),
                'password' => Hash::make($request->input('password'))
            ])) {
                $request->session()->regenerate();
                //TODO reindirizzare alla homepage
                return redirect()->intended('');
            }
    }

}
