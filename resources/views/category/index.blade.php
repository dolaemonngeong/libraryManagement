@extends('layouts.app')

@section('contents')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<a class="btn btn-primary mb-3" href="{{ route("categories.create") }}" role="button" >Add New Category</a>

<table class="table table-bordered">
  <thead class="thead-light">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name Category</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      @foreach($categories as $category)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $category['name'] }}</td>
            <td>
                    <div class="mt-2">
                        <a href="{{ route("categories.edit", $category->id) }}" class="btn btn-primary">Update</a>
                    </div>
                    <div class="mt-2">
                        <form action="{{ route("categories.destroy", $category->id) }}" method="POST">
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