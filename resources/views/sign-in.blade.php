@extends('layout')

@section('title', 'Sign In')

@section('content')
    <div class="row">
        <h5>Sign In</h5>
        <form action="{{ route('sign-in') }}" method="post">
            @csrf
            <div class="form-group my-2">
                <label for="email">{{ __('validation.attributes.email') }}</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}"
                       class="form-control @error('email') is-invalid @enderror">
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group my-2">
                <label for="password">{{ __('validation.attributes.password') }}</label>
                <input id="password" type="password" name="password" value="{{ old('password') }}"
                       class="form-control @error('password') is-invalid @enderror">
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button class="btn btn-primary my-2" type="submit">Sign In</button>
        </form>
    </div>
@endsection
