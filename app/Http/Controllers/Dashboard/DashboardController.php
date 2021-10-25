<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;

class DashboardController extends Controller
{



    public function index() {
        $users = User::all();
        return view('dashboard.dashboard', ['$users' => $users]);
    }


    public function logout() {
        auth()->logout();
        return redirect()->route('login');
    }
}
