@extends('layout')

@section('title', 'Contact Us')

@section('content')
    <div class="row">
        <h5>Contact Us</h5>
        <form action="{{ route('contact.store') }}" method="post">
            @csrf
            <div class="form-group my-2">
                <label for="name" class="visually-hidden">{{ __('validation.attributes.name') }}</label>
                <input id="name" type="text" placeholder="Name" name="name" value="{{ old('name') }}"
                       class="form-control @error('name') is-invalid @enderror">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group my-2">
                <label for="email" class="visually-hidden">{{ __('validation.attributes.email') }}</label>
                <input id="email" type="email" placeholder="Email" name="email" value="{{ old('email') }}"
                       class="form-control @error('email') is-invalid @enderror">
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group my-2">
                <label for="phone" class="visually-hidden">{{ __('validation.attributes.phone') }}</label>
                <input id="phone" type="text" placeholder="Phone" name="phone" value="{{ old('phone') }}"
                       class="form-control @error('phone') is-invalid @enderror">
                @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button class="btn btn-primary my-2" type="submit">Submit</button>
        </form>
    </div>
@endsection
