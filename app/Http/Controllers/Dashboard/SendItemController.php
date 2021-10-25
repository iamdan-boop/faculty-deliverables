<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SendItemController extends Controller
{
    public $items = array(1, 3);

    public function index() {
        return view('dashboard.senditem', ['items' => $this->items]);
    }


    public function addItem() {
        array_push($items, 5,6);
    }
}
