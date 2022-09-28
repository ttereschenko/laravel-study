@extends('layout')

@section('title', 'Details')

@section('content')
    <div class="row g-4 py-5 text-center">
        <div class="col-lg-6 mx-auto">
            <h2 class="fs-2">{{ $actor->name }} {{ $actor->surname }}</h2>
            <h3 class="fs-2">{{ $actor->patronymic }}</h3>
            <h3 class="fs-2">{{ $actor->date_of_birth }}</h3>
            <h3 class="fs-2">{{ $actor->growth }} centimeters</h3>
        </div>
    </div>
@endsection
