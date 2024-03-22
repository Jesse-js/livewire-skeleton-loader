<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class UserList extends Component
{
    use WithPagination;


    public function placeholder(): View
    {
        return view('loading');
    }
    public function render(): View
    {
        sleep(3);
        $users = User::latest()->paginate(5);
        return view('livewire.user-list', ['users' => $users, 'total' => $users->total()]);
    }
}
