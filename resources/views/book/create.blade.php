@extends('layouts.app')

@section('contents')

<form action="{{ route("books.store") }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="members">Member</label>

        {{-- jika seluruh member pinjam semua buku, maka tampilkan kalau tidak ada member yang bisa meminjam buku --}}
        @if($members->isEmpty())
        <p class="text-danger">No available members to assign this book. Please Add New Members!</p>

        {{-- jika ada member yang bisa pinjam buku, maka tampilkan seluruh nama member yang bisa pinjam buku  --}}
        @else
        <select name="member_id" id="members" class="form-select">
            @foreach($members as $member)
            <option value="{{ $member->id }}">{{ $member->name }}</option>
            @endforeach
        </select>
        @endif

        {{-- jika kosong, tampilkan text error --}}
        @if($errors->has('member_id'))
        <p class="text-danger">{{ $errors->first('member')}}</p>
        @endif
    </div>

    <div class="mb-3">
        <label for="">Title</label>
        <input type="text" name="title" class="form-control">
        @if($errors->has('title'))
        <p class="text-danger">{{ $errors->first('title')}}</p>
        @endif
    </div>


    <div class="mb-3">
        <label for="">Year Release</label>
        <input type="number" name="year_release" class="form-control">
        @if($errors->has('year_release'))
        <p class="text-danger">{{ $errors->first('year_release')}}</p>
        @endif
    </div>

    <div class="mb-3">
        <label for="">Author</label>
        <input type="text" name="author" class="form-control">
        @if($errors->has('author'))
        <p class="text-danger">{{ $errors->first('author')}}</p>
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
        @if($errors->has('categories'))
        <p class="text-danger">{{ $errors->first('categories')}}</p>
        @endif
    </div>
    <button type="submit" class="btn btn-outline-success">Submit</button>
</form>

@endsection
