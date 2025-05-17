
<!-- Edit User Modal -->
@foreach ($users as $user)
    <div class="modal fade" id="editUserModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel{{ $user->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form id="editUserForm{{ $user->id }}" method="POST" action="{{ route('users.update', $user->id) }}">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editUserModalLabel{{ $user->id }}">Edit User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <input type="hidden" id="edit_user_id" value="{{ $user->id }}">

                        <div class="form-group">
                            <label for="edit_name">Full Name:</label>
                            <input type="text" name="name" id="edit_name" class="form-control" value="{{ $user->name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="edit_email">Email Address:</label>
                            <input type="email" name="email" id="edit_email" class="form-control" value="{{ $user->email }}" required>
                        </div>

                        <!-- Optional: Password update -->
                        <div class="form-group">
                            <label for="edit_password">New Password (leave blank to keep current):</label>
                            <input type="password" name="password" id="edit_password" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="edit_password_confirmation">Confirm New Password:</label>
                            <input type="password" name="password_confirmation" id="edit_password_confirmation" class="form-control">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update User</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endforeach