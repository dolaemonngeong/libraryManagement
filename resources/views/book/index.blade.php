@extends('layouts.app')

@section('contents')

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<a class="btn btn-primary" href="{{ route("books.create") }}" role="button">Add New Book</a>

<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Member</th>
            <th scope="col">Title</th>
            <th scope="col">Year Release</th>
            <th scope="col">Author</th>
            <th scope="col">Category</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            @foreach($books as $book)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            @if($book->member->name)
            <td>{{ $book->member->name }}</td>
            @else
            <td>No member</td>
            @endif
            <td>{{ $book['title'] }}</td>
            <td>{{ $book['year_release'] }}</td>
            <td>{{ $book['author'] }}</td>

            @if($book->categories)
            @foreach ($book->categories as $category) 
            <div class="mt-2">
            <td>
            {{ $category->name }}
            </td>
            </div>
            
            @endforeach
            @else
            <td>No Category</td>
            @endif

            <td>
                <div class="mt-2">
                    <a href="{{ route("books.edit", $book->id) }}" class="btn btn-primary">Update</a>
                </div>
                <div class="mt-2">
                    <form action="{{ route("books.destroy", $book->id) }}" method="POST">
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
