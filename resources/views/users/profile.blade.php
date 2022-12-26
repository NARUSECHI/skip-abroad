@extends('layouts.app')

@section('title','プロフィール')

@section('content')
    <h4 class="text-center">{{ $user->avatar_name}}</h4>
    @if ($user->avatar_image)
        <img src="{{asset('storage/avatars/'.$user->avatar_image)}}" alt="{{ $user->avatar_image}}" class="rounded icon-lg">
    @else
        <i class="fa-regular fa-face-smile text-dark icon-lg"></i>
    @endif
    <p>{{$user->country}}</p>
    <p>
    @if ($user->gender===1)
        男性
    @else
        女性
    @endif
    </p>
    <p>応援している人</p>
    <p>応援してくれている人</p>
    <a href="{{ route('profile.edit',$user->id) }}">プロフィールを編集する</a>
    

    <div class="mt-5">
        <hr>
        @forelse ($user->posts as $post)
            <a href="{{route('posts.show',$post->id)}}">
                <img src="{{ asset('storage/images/'.$post->image)}}" alt="{{$post->image}}" class="img-sm">
            </a>
        @empty
        <div class="text-center mt-5">
            <h1 class="text-muted h3">まだ投稿はありません</h1> 
            <p class="text-muted h5"><a href="#">投稿を作成する</a></p>
        </div>           
        @endforelse
@endsection