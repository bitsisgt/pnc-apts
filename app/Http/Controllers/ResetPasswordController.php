<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    // Método para mostrar el formulario de restablecimiento de contraseña
    public function showResetForm(Request $request)
    {
        $token = $request->route('token');
        $email = $request->email;
        return view('reset-passwd', compact('token', 'email'));
    }

    // Método para restablecer la contraseña
    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $resetStatus = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => bcrypt($password),
                    'remember_token' => null,
                ])->save();
            }
        );

        if ($resetStatus == Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('status', trans($resetStatus));
        } else {
            return back()->withErrors(['email' => trans($resetStatus)]);
        }
    }
}

