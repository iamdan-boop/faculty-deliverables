<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;


class LogsController extends Controller
{

    public function index()
    {
        return view('dashboard.logs');
    }
}
