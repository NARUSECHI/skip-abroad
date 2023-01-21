@extends('layouts.app')

@section('title','Admin Users')
    
@section('content')
    <div class="col-8">
        <h1>All Users</h1>
        <table class="table table-sm align-middle bg-white border">
            <thead class="table-warning border border-0 border-bottom border-1 border-dark">
                <tr>
                    <th>ID</th>
                    <th>Avatar_Image</th>
                    <th>AvaterName</th>
                    <th>Email</th>
                    <th>Role_ID</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($all_users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>
                            @if ($user->avatar_image)
                                <img src="{{ asset('storage/avatars/'.$user->avatar_image) }}" alt="{{$user->avatar_image}}" class="img-mid">
                            @else
                                <i class="fa-regular fa-face-smile text-dark icon-mid"></i>
                            @endif
                        </td>
                        <td>{{$user->avatar_name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role_id}}</td>
                        <td>
                            @if ($user->trashed())
                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#activate-user-{{$user->id}}">
                                    <i class="fa-solid fa-user-xmark"></i>
                                </button>
                                @include('admin.modal.activate')
                            @else
                                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#deactivate-user-{{$user->id}}">
                                    <i class="fa-solid fa-user-plus"></i>
                                </button>
                                @include('admin.users.modal.deactivate')
                            @endif    
                        </td>
                    </tr>    
                @endforeach
            </tbody>
        </table>
    </div>

   
    
@endsection