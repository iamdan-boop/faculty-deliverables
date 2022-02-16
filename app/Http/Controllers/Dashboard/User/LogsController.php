<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class LogsController extends Controller
{

    public function index()
    {
        $packages = Package::with(['packageSender'])
            ->where('receiver_id', auth()->user()->id)
            ->paginate(10);
        return view('dashboard.logs', compact('packages'));
    }
}
