<div wire:poll.3s>
    <div class="d-flex align-items-start  my-3">
        <h1 class="d-inline">Users List</h1> <span class=" badge text-bg-primary rounded-pill">{{ $total }}</span>
    </div>
    <ol class="list-group list-group-numbered">
        @foreach ($users as $user)
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">{{ $user->name }}</div>
                    {{ $user->email }} - {{ $user->created_at->diffForHumans() }}
                </div>
                <span class="btn btn-primary rounded-pill">View</span>
            </li>
        @endforeach
    </ol>
    <div class="mt-2">
        {{ $users->links() }}
    </div>
</div>
