@extends('layout')

@section('title', $movie->title)

@section('content')
    <div class="row">
        <h5>Edit Movie</h5>
        <form action="{{ route('movie.edit', ['movie' => $movie->id]) }}" method="post">
            @csrf
            <div class="form-group my-2">
                <label for="title" class="visually-hidden">{{ __('validation.attributes.title') }}</label>
                <input id="title" type="text" placeholder="Title" name="title" value="{{ $movie->title }}"
                       class="form-control @error('title') is-invalid @enderror">
                @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group my-2">
                <label for="year" class="visually-hidden">{{ __('validation.attributes.year') }}</label>
                <input id="year" type="text" placeholder="Release Year" name="year" value="{{ $movie->year }}"
                       class="form-control @error('year') is-invalid @enderror">
                @error('year')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group my-2">
                <div class="form-control @error('genres') is-invalid @enderror">
                    <a class="link-secondary text-decoration-none btn-toggle dropdown-toggle" data-bs-toggle="collapse"
                       data-bs-target="#genre-collapse">
                        Change the Genres
                    </a>
                    <div class="collapse" id="genre-collapse">
                        <ul class="btn-toggle-nav list-unstyled m-1">
                            @foreach($genres as $genre)
                                <li>
                                    <input type="checkbox" name="genres[]" value="{{ $genre->id }}"
                                           class="form-check-input m-1" @if($movie->genres->contains('id',$genre->id))
                                           checked @endif> {{ $genre->name }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @error('genres')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group my-2">
                <div class="form-control @error('actors') is-invalid @enderror">
                    <a class="link-secondary text-decoration-none btn-toggle dropdown-toggle" data-bs-toggle="collapse"
                       data-bs-target="#actors-collapse">
                        Change the Cast
                    </a>
                    <div class="collapse" id="actors-collapse">
                        <ul class="btn-toggle-nav list-unstyled m-1">
                            @foreach($actors as $actor)
                                <li>
                                    <input type="checkbox" name="actors[]" value="{{ $actor->id }}"
                                           class="form-check-input m-1" @if($movie->actors->contains('id',$actor->id))
                                           checked @endif> {{ $actor->name }} {{ $actor->surname}}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @error('actors')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group my-2">
                <label for="description" class="visually-hidden">{{ __('validation.attributes.description') }}</label>
                <textarea id="description" placeholder="Description" name="description"
                          class="form-control @error('description') is-invalid @enderror">{{ $movie->description }}</textarea>
                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button class="btn btn-primary my-2" type="submit">Edit</button>
        </form>
    </div>
@endsection
