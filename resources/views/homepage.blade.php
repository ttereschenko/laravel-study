@extends('layout')

@section('title', 'Homepage')

@section('content')
    <div class="row mt-4">
        <div class="col-md-8">
            @if($movies->isEmpty())
                <h2>Movies not found</h2>
            @endif
            @foreach($movies as $movie)
                    <article class="mb-3">
                        <h2 class="mb-1">{{ $movie->title }}</h2>
                        <p class="mb-1 text-muted">{{ $movie->year }}</p>
                        <p class="mb-1">
                            @foreach($movie->genres as $genre)
                                <span>{{ $genre->name }}</span>
                            @endforeach
                        </p>
                    </article>
            @endforeach
                <div class="d-flex justify-content-center">
                    {!! $movies->links() !!}
                </div>
        </div>
        <div class="col-md-4">
            <ul class="list-unstyled">
                <form action="{{ route('home') }}">
                    <div class="input-group">
                        <input class="form-control my-2" type="text" placeholder="Enter the Title" name="title"
                               value="{{ request()->get('title') }}">
                    </div>
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="Release Year" name="year"
                               value="{{ request()->get('year') }}">
                    </div>
                    <p class="my-2">Choose Genres</p>
                    @foreach($genres as $genre)
                        <div class="form-check">
                            <input type="checkbox" name="genres[]" value="{{ $genre->id }}"
                            @if(in_array($genre->id, request()->get('genres', []))) checked @endif> {{ $genre->name }}
                        </div>
                    @endforeach
                    <p class="my-2">Choose Actors</p>
                    @foreach($actors as $actor)
                        <div class="form-check">
                            <input type="checkbox" name="actors[]" value="{{ $actor->id }}"
                           @if(in_array($actor->id, request()->get('actors', []))) checked @endif> {{ $actor->name }} {{ $actor->surname }}
                        </div>
                    @endforeach
                    <button class="btn btn-primary my-2">Search</button>
                </form>
            </ul>
        </div>
    </div>
@endsection
