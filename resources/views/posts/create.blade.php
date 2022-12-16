@extends('layouts.app')

@section('title','Create New Post')
    
@section('content')
    <h1>新しい投稿</h1>
    {{-- Add Category --}}
    <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row mt-3">
            <label for="image" class="form-label fw-bold">写真</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        @error('image')
            <div class="text-danger small">{{$message}}</div>            
        @enderror
        <div class="row mt-3">
            <label for="title" class="form-label fw-bold">タイトル</label>
            <input type="text" name="title" id="title" class="form-control">
        </div>
        @error('title')
            <div class="text-danger small">{{$message}}</div>            
        @enderror
        <div class="row mt-3">
            <label for="description" class="form-label fw-bold">内容</label>
            <textarea name="description" id="description" rows="10" class="form-control" placeholder="コメントをつけて投稿しよう"></textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-5 form-control">投稿する</button>
    </form>

@endsection