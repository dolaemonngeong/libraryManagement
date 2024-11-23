@extends('layouts.app')

@section('contents')

 <form action="{{ route("members.update", $member->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_method" value="PATCH">
    <div class="mb-3">
        <label for="">Name</label>
        <input type="text" name="name" class="form-control" value="{{ $member->name }}">
        {{-- @if($errors->has('name'))
            <p class="text-danger">{{ $errors->first('name')}}</p>
        @endif --}}
    </div>

    <div class="mb-3">
        <label for="">Address</label>
        <input type="text" name="address" class="form-control" value="{{ $member->address }}">
        {{-- @if($errors->has('address'))
            <p class="text-danger">{{ $errors->first('address')}}</p>
        @endif --}}
    </div>
    
    <div class="mb-3">
        <label for="">Email</label>
        <input type="text" name="email" class="form-control" value="{{ $member->email }}">
        {{-- @if($errors->has('email'))
            <p class="text-danger">{{ $errors->first('email')}}</p>
        @endif --}}
    </div>

    <div class="mb-3">
        <label for="">Phone Number</label>
        <input type="text" name="phone_number" class="form-control" value="{{ $member->phone_number }}">
        {{-- @if($errors->has('phone_number'))
            <p class="text-danger">{{ $errors->first('phone_number')}}</p>
        @endif --}}
    </div>
    <input type="submit" class="btn btn-outline-success">
 </form>
@endsection