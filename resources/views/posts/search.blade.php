@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <div class="mt-3">
            <h1>Search::{{$search}}</h1> 
            {{-- if  --}}
            <h1 class="text-center">Popular posts</h1>
            <hr>
        </div>
        <div class="mt-5">
            <h1 class="text-center">Latest posts</h1>
            <hr>
            @forelse ($search_posts as $post)
                <a href="{{ route('posts.show',$post->id) }}">
                    <img src="{{ asset('storage/images/'.$post->image)}}" alt="{{$post->image}}" class="img-sm">
                </a>
            @empty
            <div class="text-center mt-5">
                <h1 class="text-muted h3">No post yet</h1> 
                <p class="text-muted h5"><a href="{{ route('posts.create')}}">Make new post</a></p>
            </div>           
            @endforelse
        </div>
    </div>
@endsection
