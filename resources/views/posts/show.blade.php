@extends('layouts.app')

@section('title','show')

@section('content')
<div class="d-flex justify-content-center">
    <div class="col-5">
        <div class="card border-2">
            <img src="{{asset('storage/images/'.$post->image)}}" alt="{{$post->image}}" class="card-img-top img-lg mx-auto mt-2">
            <div class="card-body mx-2">
                <div class="row mt-2 gx-2">
                    <div class="col-auto">
                        @if ($post->user->avatar_image)
                            <img src="{{ asset('storage/avatars/'.$post->user->avatar_image)}}" alt="{{ $post->user->avatar_image}}" class="img-xs rounded-circle">                                        
                        @else
                            <i class="fa-regular fa-face-smile text-dark icon-sm"></i>
                        @endif
                    </div>
                    <div class="col-auto">
                        <span class="ms-2 align-middle">{{$post->user->avatar_name}}</span>
                    </div>
                    <div class="col-auto ms-auto">
                        <i class="fa-regular fa-heart fs-3"></i> <span class="fs-5">Like</span>
                    </div>
                </div>
                <div class="row my-2">
                    <span>{{$post->description}}</span>
                </div>
                <div class="row">
                    <div class="col-auto ms-auto">
                        <div class="dropdown me-auto">
                            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="dropdown" id="dropdownMenuLink">
                                <i class="fa-solid fa-ellipsis"></i>
                            </button>

                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li>
                                    <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#staticModal-{{ $post->id }}">
                                        Delete
                                    </button>
                                </li>
                            </ul>
                            {{-- Add Modal --}}
                            @include('posts.modal.delete')
                        </div>
                    </div>
                </div>
            </div>
            
                @if ($all_comments->count()>0)
                    <div class="card-footer">
                        <h4 class="text-muted">Comments</h4>
                            @foreach ($all_comments as $comment)
                                <hr>
                                    <div class="row">
                                        <div class="col-auto">
                                            @if ($comment->user->avatar_image)
                                                <img src="{{'storage/avatars/'.$comment->user->avatar_image}}" alt="{{$comment->user->avatar_image}}" class="img-xs rounded-circle">
                                            @else
                                                <i class="fa-regular fa-face-smile text-dark icon-sm"></i>
                                            @endif
                                        </div>
                                        <div class="col-auto">
                                        {{$comment->user->avatar_image}}
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