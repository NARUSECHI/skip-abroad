{{-- @extends('layouts.app')

@section('title','Edit')
    
@section('content')
<h1>新しい投稿</h1>
<form action="{{ route('posts.update',$post->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PATCH')

    <div class="row mt-3">
        <img src="{{asset('storage/images/'.$post->image)}}" alt="{{$post->image}}" class="img-sm">
        <label for="image" class="form-label fw-bold">写真</label>
        <input type="file" name="image" id="image" class="form-control">
    </div>
    @error('image')
        <div class="text-danger small">{{$message}}</div>            
    @enderror
    <div class="row mt-3">
        <label for="title" class="form-label fw-bold">タイトル</label>
        <input type="text" name="title" id="title" class="form-control" value="{{old('title',$post->title)}}">
    </div>
    @error('title')
        <div class="text-danger small">{{$message}}</div>            
    @enderror
    <div class="row mt-3">
        <label for="description" class="form-label fw-bold">内容</label>
        <textarea name="description" id="description" rows="10" class="form-control" placeholder="コメントをつけて投稿しよう" >{{old('description',$post->description)}}</textarea>
    </div>

    <button type="submit" class="btn btn-primary mt-5 form-control">投稿を編集する</button>
</form>    
@endsection --}}
