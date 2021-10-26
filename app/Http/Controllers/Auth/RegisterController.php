<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() {
        return view('authentication.signup');
    }

    public function store(Request $request) {
        $fields = $request->validate([
            'name' => 'required|max:20',
            'contactNumber' => 'required|unique:users,contactNumber',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'campus' => 'required|string',
            'position' => 'required|string'
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'contactNumber' => $fields['contactNumber'],
            'email' => $fields['email'],
            'password' => Hash::make($fields['password']),
            'campus' => $fields['campus'],
            'position' => $fields['position'],
        ]);
        auth()->attempt($user->only('email', 'password'));

        return redirect()->route('dashboard');
    }
}
