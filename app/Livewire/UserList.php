<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class UserList extends Component
{
    use WithPagination;

    public ?string $search = null;

    public function placeholder(): View
    {
        return view('loading');
    }
    public function render(): View
    {
        $users = User::latest()
            ->whereAny(['name', 'email'], 'LIKE', "%{$this->search}%")
            ->paginate(5);
        return view('livewire.user-list', ['users' => $users, 'total' => $users->total()]);
    }
}
