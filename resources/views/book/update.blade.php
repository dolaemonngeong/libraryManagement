@extends('layouts.app')

@section('contents')

<form action="{{ route("books.update", $book->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_method" value="PATCH">
    <div class="mb-3">
        <label for="members">Member</label>
        <select name="member_id" id="members" class="form-select">
            @foreach($members as $member)
            <option value="{{ $member->id }}" {{ $member->id == $book->member_id ? 'selected' : '' }}>
                {{ $member->name }}
            </option>
            @endforeach
        </select>
        @if($errors->has('member_id'))
        <p class="text-danger">{{ $errors->first('member')}}</p>
        @endif
    </div>

    <div class="mb-3">
        <label for="">Title</label>
        <input type="text" name="title" class="form-control" value="{{ $book->title }}">
        @if($errors->has('title'))
        <p class="text-danger">{{ $errors->first('title')}}</p>
        @endif
    </div>

    <div class="mb-3">
        <label for="">Year Release</label>
        <input type="number" name="year_release" class="form-control" value="{{ $book->year_release }}">
        @if($errors->has('year_release'))
        <p class="text-danger">{{ $errors->first('year_release')}}</p>
        @endif
    </div>

    <div class="mb-3">
        <label for="">Author</label>
        <input type="text" name="author" class="form-control" value="{{ $book->author }}">
        @if($errors->has('author'))
        <p class="text-danger">{{ $errors->first('author')}}</p>
        @endif
    </div>


    <div class="mb-3">
        <label for="">Category</label>
        @foreach($categories as $category)
        <br>
        <input class="form-check-input" type="checkbox" name="categories[]" value="{{ $category->id }}"
            {{ $book->categories->contains($category->id) ? 'checked' : ''}}>
        <label class="form-check-label" for="defaultCheck1">
            {{ $category->name }}
        </label>
        @endforeach
        {{-- @foreach($errors->get('categories.*') as $error)
        <p class="text-danger">{{ $error[0] }}</p>
        @endforeach --}}
    </div>


    <input type="submit" class="btn btn-outline-success">
</form>

@endsection
