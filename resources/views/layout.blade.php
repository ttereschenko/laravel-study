<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
            <span class="fs-4">My App</span>
        </a>
        <ul class="nav nav-pills me-3">
            <li class="nav-item"><a href="{{ route('home') }}" class="nav-link active" aria-current="page">Home</a></li>
            <li class="nav-item"><a href="{{ route('about') }}" class="nav-link">About</a></li>
            @if(auth()->check())
            <li class="nav-item"><a href="{{ route('movie.list') }}" class="nav-link">All Movies</a></li>
            <li class="nav-item"><a href="{{ route('movie.create') }}" class="nav-link">Add Movie</a></li>
            @endif
            <li class="nav-item"><a href="{{ route('contact') }}" class="nav-link">Contacts</a></li>
        </ul>
            <div class="dropdown p-1">
                <a href="#" class="d-block link-dark text-decoration-none py-1" data-bs-toggle="dropdown" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                    </svg>
                </a>
                <ul class="dropdown-menu text-center">
                    @if(!auth()->check())
                    <li><a  href="{{ route('sign-up.form') }}" class="dropdown-item">Sign Up</a></li>
                    <li><a  href="{{ route('sign-in.form') }}" class="dropdown-item">Sign In</a></li>
                    @endif
                    @if(auth()->check())
                        <li>
                            <form action="{{ route('sign-out') }}" method="post" class="form-inline">
                                @csrf
                                <button class="dropdown-item">Sign Out</button>
                            </form>
                        </li>
                        @endif
                </ul>
            </div>
    </header>
    @include('flash-messages')
    @yield('content')
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>
