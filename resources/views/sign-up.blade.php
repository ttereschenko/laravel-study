@extends('layout')

@section('title', 'Sign Up')

@section('content')
    <div class="row">
        <h5>Sign Up</h5>
        <form action="{{ route('sign-up') }}" method="post">
            @csrf
            <div class="form-group my-2">
                <label for="name">{{ __('validation.attributes.name') }}</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}"
                       class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
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
            <div class="form-group my-2">
                <label for="password_confirmation">{{ __('validation.attributes.password_confirmation') }}</label>
                <input id="password_confirmation" type="password" name="password_confirmation"
                       value="{{ old('password_confirmation') }}"
                       class="form-control @error('email') is-invalid @enderror">
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group my-2">
                <input id="agreement" type="checkbox" name="agreement" class="form-check-input @error('agreement') is-invalid @enderror">
                I agree to the <a href="#">Privacy Policy</a>
                @error('agreement')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button class="btn btn-primary my-2" type="submit">Sign Up</button>
        </form>
    </div>
@endsection
