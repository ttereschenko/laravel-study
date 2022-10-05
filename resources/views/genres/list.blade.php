@extends('layout')

@section('title', 'Genres')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($genres as $genre)
            <tr>
                <th scope="row">{{ $genre->id }}</th>
                <td>{{ $genre->name }}</td>
                <td>{{ $genre->created_at?->format('Y/m/d') }}</td>
                <td>
                    @can('show', $genre)
                        <a href="{{ route('genre.show', ['genre' => $genre->id]) }}">Show Details</a>
                    @endcan
                    <br>
                    @can('edit', $genre)
                    <a href="{{ route('genre.edit.form', ['genre' => $genre->id]) }}">Edit</a>
                    @endcan
                    <br>
                    @can('delete', $genre)
                    <form action="{{ route('genre.delete', ['genre' => $genre->id]) }}" method="post">
                        @csrf
                        <button class="btn p-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                            </svg>
                        </button>
                    </form>
                    @endcan
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {!! $genres->links() !!}
    </div>
@endsection
