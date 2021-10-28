<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

class SendItemController extends Controller
{

    public function index()
    {
        return view('dashboard.senditem', ['items' => $this->items]);
    }
}
