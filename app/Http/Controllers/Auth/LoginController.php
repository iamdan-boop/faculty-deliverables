<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginUserRequest;

class LoginController extends Controller
{

    public function index() {
        return view('authentication.login');
    }


    public function login(LoginUserRequest $request) {
        if (!auth()->attempt($request->validated())) {
            return back()->with('status', 'Invalid Email or Password');
        }
        return redirect()->route('dashboard');
    }
}
