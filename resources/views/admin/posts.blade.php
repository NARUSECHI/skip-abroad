@extends('layouts.app')

@section('title','Admin Posts')

@section('content')
    <div class="col-8">
        <h1>All Posts</h1>
        <table class="table table-sm align-middle text-align-center border bg-white">
            <thead class="table-success border border-0 border-bottom border-dark">
                <tr>
                    <th>ID</th>
                    <th>IMAGE</th>
                    <th>TITLE</th>
                    <th>DESCRIPTION</th>
                    <th>USER_ID</th>
                    <th>Delete</th>
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
                            <form action="#" method="post">
                                @csrf
                                @method('DELETE')

                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" >
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                                
                                {{-- Include Modal --}}
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
@endsection