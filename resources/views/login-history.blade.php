@extends('layout')

@section('title', 'Login History')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">IP Address</th>
            <th scope="col">Created At</th>
        </tr>
        </thead>
        <tbody>
        @foreach($entries as $entry)
            <tr>
                <td>{{ $entry->id }}</td>
                <td>{{ $entry->ip_address }}</td>
                <td>{{ $entry->created_at }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {!! $entries->links() !!}
    </div>
@endsection

