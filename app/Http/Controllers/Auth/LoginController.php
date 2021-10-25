<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index() {
        return view('authentication.login');
    }


    public function login(Request $request) {
        $fields = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);
        if (!auth()->attempt(['email' => $fields['email'], 'password' => $fields['password']])) {
            return back()->with('status', 'Invalid Email or Password');
        }
        return redirect()->route('dashboard');
    }
}
