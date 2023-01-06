@extends('layouts.app')

@section('title','show')

@section('content')
<div class="d-flex justify-content-center">
    <div class="col-5">
        <div class="card border-2">
            <img src="{{asset('storage/images/'.$post->image)}}" alt="{{$post->image}}" class="card-img-top img-lg mx-auto mt-2">
            <div class="card-body mx-2">
                <div class="row mt-1 gx-2">
                    <div class="col-auto">
                        @if ($post->user->avatar_image)
                            <img src="{{ asset('storage/avatars/'.$post->user->avatar_image)}}" alt="{{ $post->user->avatar_image}}" class="img-xs rounded-circle">                                        
                        @else
                            <i class="fa-regular fa-face-smile text-dark icon-sm"></i>
                        @endif
                    </div>
                    <div class="col">
                        <span class="ms-2 align-middle">{{$post->user->avatar_name}}</span>
                    </div>
                    <div class="col-auto ms-auto">
                        @if ($post->isLike())
                            <form action="{{ route('like.destroy',$post->id) }}" method="post">
                                @csrf
                                @method('DELETE')

                            <button type="submit" class="btn bg-transparent text-danger">
                                <i class="fa-solid fa-heart fs-3"></i><span class="fs-5">Like</span>
                            </button>
                        @else
                            <form action="{{ route('like.store',$post->id)}}" method="post">
                                @csrf

                                <button type="submit" class="btn bg-transparent text-danger">
                                     <i class="fa-regular fa-heart fs-3"></i> <span class="fs-5">Like</span>
                                </button>
                            </form>
                                   
                        @endif
                            
                        {{$post->likes->count()}}
                        </form>
                    </div>
                    <div class="col-auto ms-auto">
                        <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#staticModal-{{ $post->id }}">
                            Delete
                        </button>
                        {{-- Add Modal --}}
                        @include('posts.modal.delete')
                    </div>
                </div>
                <div class="row my-1">
                    <span>{{$post->description}}</span>
                </div>
                <form action="{{ route('comment.store',$post->id) }}" method="post">
                    @csrf

                    <div class="input-group">
                        <textarea name="body{{$post->id}}"rows="2" placeholder="Comment..."></textarea>
                        @error('comment_body'.$post->id)
                            {{$message}}
                        @enderror
                        <button type="submit" class="btn btn-primary">Comment</button>
                    </div>
                </form>
            </div>
            
                @if ($all_comments->count()>0)
                    <div class="card-footer">
                        <h4 class="text-muted">Comments</h4>
                            @foreach ($all_comments as $comment)
                                <hr>
                                    <div class="row">
                                        <div class="col-auto">
                                            @if ($comment->user->avatar_image)
                                                <img src="{{ asset('storage/avatars/'.$comment->user->avatar_image) }}" alt="{{$comment->user->avatar_image}}" class="img-xs rounded-circle">
                                            @else
                                                <i class="fa-regular fa-face-smile text-dark icon-sm"></i>
                                            @endif
                                        </div>
                                        <div class="col">
                                            {{$comment->user->avatar_name}}
                                        </div>
                                        <div class="col-auto ms-auto">
                                            <form action="{{ route('comment.destroy',$comment->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn bg-transparent text-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="row">
                                        {{$comment->body}}
                                    </div>
                                <hr>
                            @endforeach
                            @else
                            @endif
                     </div>
        </div>
    </div>
</div>
        
    
@endsection