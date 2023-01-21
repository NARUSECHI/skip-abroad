<div class="modal fade" id="hide-post-{{ $post->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Hide Post</h5>
            </div>
            <div class="modal-body">
                Are you sure to hide {{$post->title}} post?
                <img src="{{ asset('storage/images/'.$post->image)}}" alt="{{$post->image}}">
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-auto">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                    <div class="col">
                        <form action="{{ route('admin.posts.hide',$post->id )}}" method="post">
                            @csrf
                            @method('delete')

                            <button type="submit" class="btn btn-danger">Hide</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>