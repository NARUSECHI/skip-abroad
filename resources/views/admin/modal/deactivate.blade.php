<div class="modal fade" id="deactivate-user-{{$user->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Deactivate User</h5>
            </div>
            <div class="modal-body">
                <p class="text-danger">Are you sure to deactivate this user?</p>
                <p>NAME:{{ $user->avatar_name }}</p>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-auto">
                        <button data-bs-dismiss="modal" class="btn btn-secondary">Cancel</button>
                    </div>
                    <div class="col">
                        <form action="{{ route('admin.users.deactivate',$user->id )}}" method="post">
                            @csrf
                            @method('DELETE')
                            
                            <button type="submit" class="btn btn-outline-danger">Deactivate</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>