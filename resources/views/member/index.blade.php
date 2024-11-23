@extends('layouts.app')

@section('contents')

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<a class="btn btn-primary" href="{{ route("members.create") }}" role="button">Add New Member</a>

<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name </th>
            <th scope="col">Address </th>
            <th scope="col">Email </th>
            <th scope="col">Phone Number </th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            @foreach($members as $member)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $member['name'] }}</td>
            <td>{{ $member['address'] }}</td>
            <td>{{ $member['email'] }}</td>
            <td>{{ $member['phone_number'] }}</td>
            <td>
                <div class="mt-2">
                    <a href="{{ route("members.edit", $member->id) }}" class="btn btn-primary">Update</a>
                </div>
                <div class="mt-2">
                    <form action="{{ route("members.destroy", $member->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            Delete
                        </button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
        </tr>
    </tbody>
</table>

@endsection
