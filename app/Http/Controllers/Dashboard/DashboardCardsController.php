<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;

class DashboardCardsController extends Controller
{

    public function index()
    {
        $users = User::count();
        return view('dashboard.dashboard_cards', ['users' => $users]);
    }
}
