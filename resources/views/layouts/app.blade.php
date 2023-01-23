<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                    </ul>
                    <div class="col-5">
                        <div class="m-auto">          
                                <form action="{{ route('search') }}" method="post">
                                    @csrf
                                    <div class="row align-center">        
                                        <div class="col">
                                            <input type="search" name="search" id="search" class="form-control">
                                        </div>
                                        <div class="col-auto">
                                            <button id="submit" class="btn btn-primary">Search</button>
                                        </div>
                                    </div>
                                </form>                            
                        </div>
                    </div>
                    

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <button id="account-dropdown" class="btn shadow-none nav-link" data-bs-toggle="dropdown">
                                    @if (Auth::user()->avatar_image)
                                        <img src="{{ asset('storage/avatars/'. Auth::user()->avatar_image)}}" alt="{{ Auth::user()->avatar_image}}" class="rounded-circle img-xs">                                        
                                    @else
                                        <i class="fa-regular fa-face-smile text-dark icon-sm"></i>
                                    @endif
                                </button>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="account-dropdown">
                                    @can('admin')
                                        <a class="dropdown-item" href="{{route('admin.users')}}">
                                            Admin
                                        </a>
                                    <hr class="dropdown-divider">
                                    @endcan
                                    <a class="dropdown-item" href="{{route('profile.index',Auth::user()->id)}}">
                                        My Profile
                                    </a>
                                    <a class="dropdown-item" href="{{ route('posts.create')}}">
                                        New Post
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        Contact us
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @if (request()->is('admin/*'))
                <div class="container mt-3">
                        <div class="row">
                            <div class="col-3 mt-5">
                                    <div class="list-group">
                                        <a href="{{ route('admin.users')}}" class="list-group-item {{ request()->is('admin/users')?'active':'' }}">Users</a>
                                        <a href="{{ route('admin.posts')}}" class="list-group-item {{ request()->is('admin/posts')?'active':'' }}">Posts</a>
                                    </div>
                            </div>
            @endif
            @yield('content')            
                        </div>
                </div>
        </main>
    </div>
</body>
</html>
