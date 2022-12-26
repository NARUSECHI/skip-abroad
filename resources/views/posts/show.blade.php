@extends('layouts.app')

@section('title','show')

@section('content')
    <div class="row justify-content-center">
        <div class="row">
            <div class="col-7">
                <div class="card border-2 p-2">
                        <img src="{{asset('storage/images/'.$post->image)}}" alt="{{$post->image}}" class="card-img-top img-lg border border-2 border-dark">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto">
                                    {{-- Visit数を変更する --}}
                                    <span class="ms-auto">Visit数</span>
                                </div>
                                <div class="col-auto ms-auto">
                                    <div class="dropdown me-auto">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-toggle="dropdown" id="dropdownMenuLink">
                                            <i class="fa-solid fa-ellipsis"></i>
                                        </button>

                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            {{-- <li><a href="{{ route('posts.edit',$post->id) }}" class="dropdown-item">Edit</a></li> --}}
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
                    </div>
                    <div class="card border-2 p-2 mt-3">
                        <div class="row">
                            <div class="col-auto">
                                @if ($post->user->avatar_image)
                                    <img src="" alt="">                                        
                                @else
                                    <i class="fa-regular fa-face-smile text-dark icon-sm"></i>
                                @endif
                            </div>
                            <div class="col-auto">
                                <span class="ms-2">{{$post->user->avatar_name}}</span>
                            </div>
                        </div>
                        <div class="row my-2">
                            <span>{{$post->description}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    
@endsection