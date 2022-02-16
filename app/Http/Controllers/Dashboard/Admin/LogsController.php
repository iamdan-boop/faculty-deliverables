<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;

class LogsController extends Controller
{

    public function index()
    {
        $packages = Package::with(['packageSender', 'receiver'])->paginate(10);
        return view('dashboard.logs', compact('packages'));
    }
}
