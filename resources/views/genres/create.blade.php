@extends('layout')

@section('title', 'Add Genre')

@section('content')
    <div class="row">
        <h5>Add Genre</h5>
        <form action="{{ route('genre.create') }}" method="post">
            @csrf
            <div class="form-group my-2">
                <label for="name" class="visually-hidden">{{ __('validation.attributes.name') }}</label>
                <input id="name" type="text" placeholder="Genre name" name="name" value="{{ old('name') }}"
                       class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button class="btn btn-primary my-2" type="submit">Submit</button>
        </form>
    </div>
@endsection
