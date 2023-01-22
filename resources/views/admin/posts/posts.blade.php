@extends('layouts.app')

@section('title','Admin Posts')

@section('content')
    <div class="col-8">
        <h1>All Posts</h1>
        <table class="table table-sm align-middle text-align-center border bg-white text-center">
            <thead class="table-success border border-0 border-bottom border-dark">
                <tr>
                    <th>ID</th>
                    <th>IMAGE</th>
                    <th>TITLE</th>
                    <th>DESCRIPTION</th>
                    <th>USER_ID</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($all_posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td><img src="{{ asset('storage/images/'.$post->image)}}" alt="{{$post->image}}" class="img-mid"></td>
                        <td>{{$post->title}}</td>
                        <td><p class="text-truncate">{{$post->description}}</p></td>
                        <td>{{$post->user->id}}</td>
                        <td>
                            @if ($post->trashed())
                                <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#unhide-post-{{ $post->id }}">
                                    <i class="fa-solid fa-eye-slash"></i> Hide
                                </button>
                            @else
                                 <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#hide-post-{{ $post->id }}">
                                    <i class="fa-solid fa-eye"></i></i> Unhide
                                </button>
                            @endif
                                @include('admin.posts.modal.status')
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
@endsection