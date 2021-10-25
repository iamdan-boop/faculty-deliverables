<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SendItems extends Component
{

    public function increment()
    {
        dd(1231);
    }


    public function render()
    {
        return view('dashboard.senditem');
    }
}
