<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\SendItem;
use App\Models\User;

class DashboardController extends Controller
{

    public function index()
    {
        $users = User::count();
        $pendingPackages = Package::where('status', 0)->count();
        $receivedPackages = Package::where('status', 1)->count();
        $pendingPackage = Package::where(['status' => 0, 'receiver_id' => auth()->user()->id])->first();
        return view('dashboard.dashboard_cards', compact('users', 'pendingPackages', 'receivedPackages', 'pendingPackage'));
    }


    public function destroy()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
