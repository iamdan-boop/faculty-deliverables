<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{

    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index()
    {
        return view('authentication.forgot');
    }


    public function reset(Request $request) {
        return view('authentication.reset_password', ['token' => $request->token, 'email' => $request->email]);
    }

    public function store(Request $request) {
        $request->validate([
            'email' => 'email|required'
        ]);
        $status = Password::sendResetLink($request->only('email'));
        return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => 'Reset link has been sent.'])
                : back()->withErrors(['email' => __($status)]);
    }

    public function update(Request $request) {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8'
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
                $user->save();
                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET 
            ? redirect()->route('login')->with('forgotStatus', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}
