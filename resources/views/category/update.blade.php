@extends('layouts.app')

@section('contents')

 <form action="{{ route("categories.update", $category->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_method" value="PATCH">
    <div class="mb-3">
        <label for="">name</label>
        <input type="text" name="name" class="form-control" value="{{ $category->name }}">
        @if($errors->has('name'))
            <p class="text-danger">{{ $errors->first('name')}}</p>
        @endif
    </div>
    <input type="submit" class="btn btn-outline-success">
 </form>

@endsection