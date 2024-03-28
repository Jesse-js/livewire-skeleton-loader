<div wire:poll.3s>
    <div class="d-flex align-items-start  my-3">
        <h1 class="d-inline">Users List</h1> <span class=" badge text-bg-primary rounded-pill">{{ $this->users->total() }}</span>
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text"><i class="bi bi-search"></i></span>
        <div class="form-floating">
            <input type="text" class="form-control" wire:model.live.throttle.500ms="search" placeholder="Search user...">
            <label for="floatingInputGroup1">Search user..</label>
        </div>
    </div>
    <ol class="list-group list-group">
        @forelse ($this->users as $user)
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">{{ $user->name }}</div>
                    {{ $user->email }} - {{ $user->created_at->diffForHumans() }}
                </div>
                <span class="btn btn-primary rounded-pill">View</span>
            </li>
        @empty
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">No users found</div>
                </div>
            </li>
        @endforelse
    </ol>
    <div class="mt-2">
        {{ $this->users->links() }}
    </div>
</div>
