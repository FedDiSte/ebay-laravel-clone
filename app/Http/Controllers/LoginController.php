<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function authenticate(Request $request) {
        if(Auth::attempt(['username' => $request->input('username'), 'password' => $request->input('password')], $request->input('remember'))) {
                $request->session()->regenerate();
                return redirect()->intended('/');
        }

        return back()->withErrors([
            'status' => 'Username or password non corretti'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

}
