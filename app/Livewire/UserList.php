<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Pagination\LengthAwarePaginator;

class UserList extends Component
{
    use WithPagination;

    public ?string $search = null;

    public function mount(string $search = null): void
    {
        //this method is called when the component is initialized
        $this->search = $search;
    }
    
    public function placeholder(): View
    {
        return view('loading');
    }

    #[Computed]
    public function users(): LengthAwarePaginator
    {
        return User::latest()
            ->whereAny(['name', 'email'], 'LIKE', "%{$this->search}%")
            ->paginate(5);
    }
    
    public function render(): View
    {
        
        return view('livewire.user-list');
    }
}
