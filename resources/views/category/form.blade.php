@extends('layouts.app')

@section('contents')

<form action="{{ route("categories.store") }}" method="POST" >
    @csrf
    <div class="mb-3">
        <label for="">Category Name</label>
        <input type="text" name="name" class="form-control" required>
        @if($errors->has('name'))
            <p class="text-danger">{{ $errors->first('name')}}</p>
        @endif
    </div>
    <button type="submit" class="btn btn-outline-success">Submit data</button>
 </form>

@endsection