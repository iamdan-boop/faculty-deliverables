<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Models\Package;

class DashboardController extends Controller
{

    public function index()
    {
        $current_user_id = auth()->user()->id;
        $pendingPackages = Package::where(['status' => 0, 'receiver_id' => $current_user_id])->count();
        $receivedPackages = Package::where(['status' => 0, 'receiver_id' => $current_user_id])->count();
        return view('dashboard.dashboard_cards', compact('pendingPackages', 'receivedPackages'));
    }

    public function destroy()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
