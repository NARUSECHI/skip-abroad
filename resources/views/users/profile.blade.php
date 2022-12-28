@extends('layouts.app')

@section('title','プロフィール')

@section('content')
<div class="d-flex justify-content-center my-5">
    <div class="col-8">
        <div class="row">
            <div class="col-6 ms-3">
                @if ($user->avatar_image)
                    <img src="{{asset('storage/avatars/'.$user->avatar_image)}}" alt="{{ $user->avatar_image}}" class="rounded-circle img-lg">
                @else
                    <i class="fa-regular fa-face-smile text-dark icon-lg rounded-circle"></i>
                @endif
            </div>
            <div class="col-4 d-flex justify-content-center">
                <div class="my-auto">
                    <div class="introduce">
                        <h4>{{ $user->avatar_name}}</h4>
                        <h5 class="mt-4 mb-2"><span class="text-muted">Stay Country: </span>{{$user->country}}</h5>
                        <h5 class="my-2">
                        @if ($user->gender===1)
                            Male
                        @else
                            Female
                        @endif
                        </h5>
                        <h5 class="my-2"><span class="text-muted">Follow: </span></h5>
                        <h5 class="my-2"><span class="text-muted">Follower: </span></h5>
                    </div>
                    <a href="{{ route('profile.edit',$user->id) }}" class="btn btn-success mt-5">Edit profile</a>
                </div>
            </div>
        </div>
        <div class="mt-5">
            <h1 class="text-center">My Posts</h1>
            <hr>
            @forelse ($user->posts as $post)
                <a href="{{route('posts.show',$post->id)}}">
                    <img src="{{ asset('storage/images/'.$post->image)}}" alt="{{$post->image}}" class="img-sm">
                </a>
            @empty
            <div class="text-center mt-5">
                <h1 class="text-muted h3">No post yet</h1> 
                <p class="text-muted h5"><a href="#">Make a new post</a></p>
            </div>           
            @endforelse
        </div>
    </div>
</div>
@endsection