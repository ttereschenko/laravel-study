@extends('layout')

@section('title', 'Details')

@section('content')
    <div class="row g-4 py-5 text-center">
        <div class="col-lg-6 mx-auto">
            <h2 class="fs-2">{{ $genre->name }}</h2>
        </div>
    </div>
@endsection
