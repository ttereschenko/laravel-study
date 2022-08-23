@extends('layout')

@section('title', 'Contact Us')

@section('content')
    <form action="{{ route('contact-form') }}" method="post">
        @csrf
        <h5>Contact Us</h5>
        <div class="d-flex flex-column flex-sm-row w-100 gap-2 my-2">
            <label for="name" class="visually-hidden">Name</label>
            <input id="name" type="text" class="form-control" placeholder="Name" name="name">
        </div>
        <div class="d-flex flex-column flex-sm-row w-100 gap-2 my-2">
            <label for="email" class="visually-hidden">Email</label>
            <input id="email" type="email" class="form-control" placeholder="Email" name="email">
        </div>
        <div class="d-flex flex-column flex-sm-row w-100 gap-2 my-2">
            <label for="phone" class="visually-hidden">Phone</label>
            <input id="phone" type="text" class="form-control" placeholder="Phone" name="phone">
        </div>
        <button class="btn btn-primary my-2" type="submit">Submit</button>
    </form>
@endsection
