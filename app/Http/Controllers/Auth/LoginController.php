<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginUserRequest;

class LoginController extends Controller
{

    public function index()
    {
        return view('authentication.login');
    }


    public function store(LoginUserRequest $request)
    {
        if (!auth()->attempt($request->validated())) {
            return back()->with('status', 'Invalid Email or Password');
        }
        return !auth()->user()->is_admin
            ? redirect()->route('user.dashboard')
            : redirect()->route('admin.dashboard');
    }
}
