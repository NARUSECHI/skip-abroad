@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <div class="mt-3">
            {{-- if  --}}
            <h1 class="text-center">人気の投稿</h1>
            <hr>
        </div>
        <div class="mt-5">
            <h1 class="text-center">最新の投稿</h1>
            <hr>
            @forelse ($all_posts as $post)
                <a href="{{ route('posts.show',$post->id) }}">
                    <img src="{{ asset('storage/images/'.$post->image)}}" alt="{{$post->image}}" class="img-sm">
                </a>
            @empty
            <div class="text-center mt-5">
                <h1 class="text-muted h3">まだ投稿はありません</h1> 
                <p class="text-muted h5"><a href="#">投稿を作成する</a></p>
            </div>           
            @endforelse
        </div>
    </div>
@endsection
