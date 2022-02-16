<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class SendItems extends Component
{

    public $orderItems = [];
    public $users = [];

    public function render()
    {
        return view('livewire.send-items');
    }

    public function mount()
    {
        $this->users = User::all();
        $this->orderItems = [
            ['itemName' => '', 'quantity' => 1]
        ];
    }

    public function addItems()
    {
        $this->orderItems[] = ['itemName' => '', 'quantity' => 1];
    }

    public function removeItem($index)
    {
        unset($this->orderItems[$index]);
        $this->orderItems = array_values($this->orderItems);
    }
}
