@extends('layouts.app')

@section('contents')

<form action="{{ route("books.store") }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="members">Member</label>
        @if($members->isEmpty())
        <p class="text-danger">No available members to assign this book.</p>
        @else
        <select name="member_id" id="members" class="form-select">
            @foreach($members as $member)
            <option value="{{ $member->id }}">{{ $member->name }}</option>
            @endforeach
        </select>
        @endif
        @if($errors->has('member_id'))
        <p class="text-danger">{{ $errors->first('member')}}</p>
        @endif
    </div>

    <div class="mb-3">
        <label for="">Title</label>
        <input type="text" name="title" class="form-control" required>
        @if($errors->has('title'))
        <p class="text-danger">{{ $errors->first('title')}}</p>
        @endif
    </div>


    <div class="mb-3">
        <label for="">Year Release</label>
        <input type="text" name="year_release" class="form-control" required>
        @if($errors->has('year_release'))
        <p class="text-danger">{{ $errors->first('year_release')}}</p>
        @endif
    </div>

    <div class="mb-3">
        <label for="">Author</label>
        <input type="text" name="author" class="form-control" required>
        @if($errors->has('author'))
        <p class="text-danger">{{ $errors->first('email')}}</p>
        @endif
    </div>

    <div class="mb-3">
        <label for="">Category</label>
        @foreach($categories as $category)
        <br>
        <input class="form-check-input" type="checkbox" name="categories[]" value="{{ $category->id }}">
        <label class="form-check-label" for="defaultCheck1">
            {{ $category->name }}
        </label>
        @endforeach
    </div>
    <button type="submit" class="btn btn-outline-success">Submit data</button>
</form>

@endsection