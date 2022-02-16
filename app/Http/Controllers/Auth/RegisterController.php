<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('authentication.signup');
    }

    public function store(RegisterUserRequest $request)
    {
        User::create([
            'name' => $request->name,
            'contactNumber' => $request->contactNumber,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'campus' => $request->campus,
            'position' => $request->position,
        ]);
        abort_if(!auth()->attempt($request->only('email', 'password')), 403);
        return redirect()->route('user.dashboard');
    }
}
