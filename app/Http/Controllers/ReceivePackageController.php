<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class ReceivePackageController extends Controller
{
    public function index()
    {
        return view('dashboard.pending-item');
    }
}
