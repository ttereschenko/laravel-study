@extends('layout')

@section('title', 'Add Movie')

@section('content')
    <div class="row">
        <h5>Add Movie</h5>
        <form action="{{ route('movie.create') }}" method="post">
            @csrf
            <div class="form-group my-2">
                <label for="title" class="visually-hidden">{{ __('validation.attributes.title') }}</label>
                <input id="title" type="text" placeholder="Title" name="title" value="{{ old('title') }}"
                       class="form-control @error('title') is-invalid @enderror">
                @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group my-2">
                <label for="year" class="visually-hidden">{{ __('validation.attributes.year') }}</label>
                <input id="year" type="text" placeholder="Release Year" name="year" value="{{ old('year') }}"
                       class="form-control @error('year') is-invalid @enderror">
                @error('year')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group my-2">
                <label for="description" class="visually-hidden">{{ __('validation.attributes.description') }}</label>
                <textarea id="description" placeholder="Description" name="description"
                          class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button class="btn btn-primary my-2" type="submit">Submit</button>
        </form>
    </div>
@endsection
