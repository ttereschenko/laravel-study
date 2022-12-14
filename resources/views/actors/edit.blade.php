@extends('layout')

@section('title', 'Edit Actor')

@section('content')
    <div class="row">
        <h5>Edit the Actor</h5>
        <form action="{{ route('actor.edit', ['actor' => $actor->id ]) }}" method="post">
            @csrf
            <div class="form-group my-2">
                <label for="name">{{ __('validation.attributes.name') }}</label>
                <input id="name" type="text" name="name" value="{{ $actor->name  }}"
                       class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group my-2">
                <label for="surname">{{ __('validation.attributes.surname') }}</label>
                <input id="surname" type="text" name="surname" value="{{ $actor->surname }}"
                       class="form-control @error('surname') is-invalid @enderror">
                @error('surname')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group my-2">
                <label for="patronymic">{{ __('validation.attributes.patronymic') }}</label>
                <input id="patronymic" type="text" name="patronymic" value="{{ $actor->patronymic }}"
                       class="form-control @error('patronymic') is-invalid @enderror">
                @error('patronymic')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group my-2">
                <label for="date_of_birth">{{ __('validation.attributes.date_of_birth') }}</label>
                <input id="date_of_birth" type="date" name="date_of_birth" value="{{ $actor->date_of_birth }}"
                       class="form-control @error('date_of_birth') is-invalid @enderror">
                @error('date_of_birth')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group my-2">
                <label for="growth">{{ __('validation.attributes.growth') }}</label>
                <input id="growth" type="number" name="growth" value="{{ $actor->growth }}" placeholder="use centimeters"
                       class="form-control @error('growth') is-invalid @enderror">
                @error('growth')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button class="btn btn-primary my-2" type="submit">Sign Up</button>
        </form>
    </div>
@endsection
