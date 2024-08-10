<div>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('user.deteils', $user->id) }}" class="btn btn-sm btn-primary">Detail</a>
                        <a href="#" class="badge bg-warning">Edit</a>
                        <a href="#" class="badge bg-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Detail User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control" wire:model.lazy="name">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- <script>
        document.addEventListener('livewire:load', function() {
            Livewire.on('showUserModal', () => {
                var userModal = new bootstrap.Modal(document.getElementById('userModal'));
                userModal.show();
            });
        });
    </script> --}}
</div>
