<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller {

    function forgotPassword(Request $request) {
        $request -> validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request -> only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back() -> with(['status' => __($status)])
            : back() -> withErrors(['email' => __($status)]);
    }

    function passwordUpdate(Request $request) {
        $request -> validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request -> only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) use ($request) {
                $user -> forceFill([
                    'password' => Hash::make($password)
                ]) -> setRememberToken(Str::random(60));

                $user -> save();

                event(new PasswordReset($user));
                }
            );

            return $status == Password::PASSWORD_RESET
                ? redirect() -> route('login')-> with('status', __($status))
                : back() -> withErrors(['email' => [__($status)]]) ;
    }

}