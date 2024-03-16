<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserList extends Component
{
    use WithPagination;

    public function render()
    {
        $users = User::latest()->paginate(5);
        return view('livewire.user-list', ['users' => $users, 'total' => $users->total()]);
    }
}
