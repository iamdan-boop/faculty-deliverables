<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;

    public $search = '';
    public $isShow = false;
    public $userId = 0;

    protected $queryString = [
        'search',
    ];

    public function toggle($id)
    {
        $this->userId = $id;
        $this->isShow = !$this->isShow;
    }

    public function render()
    {
        $users = User::orderBy('name')
            ->where('name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->orWhere('contactNumber', 'like', '%' . $this->search . '%')
            ->orWhere('campus', 'like', '%' . $this->search . '%')
            ->paginate(10);
        return view('livewire.users', compact('users'));
    }

    public function show()
    {
        $users = User::where('name', 'like', '%' . $this->search . '%')->paginate(10);
        return view('livewire.users', compact('users'));
    }

    public function abort()
    {
        $this->reset(['isShow']);
    }

    public function destroy()
    {
        User::find($this->userId)->delete();
        $this->reset(['isShow', 'userId']);
    }
}
