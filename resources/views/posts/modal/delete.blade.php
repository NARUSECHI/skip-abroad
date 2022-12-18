<div class="modal fade" id="staticModal-{{ $post->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="text-danger">Delete</h5>
            </div>
            <div class="modal-body">
                本当にこの投稿を削除してもよろしいでしょうか？
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">キャンセル</button>
                <form action="{{ route('posts.destroy',$post->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                    <button type="submit" class="btn btn-danger">削除</button>
                </form>
            </div>
        </div>
    </div>
</div>