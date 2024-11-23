@extends('layouts.app')

@section('contents')

<form action="{{ route("members.store") }}" method="POST" >
    @csrf
    <div class="mb-3">
        <label for="">Name</label>
        <input type="text" name="name" class="form-control" >
        @if($errors->has('name'))
            <p class="text-danger">{{ $errors->first('name')}}</p>
        @endif
    </div>

    
    <div class="mb-3">
        <label for="">Address</label>
        <input type="text" name="address" class="form-control" >
        @if($errors->has('address'))
            <p class="text-danger">{{ $errors->first('address')}}</p>
        @endif
    </div>
    
    <div class="mb-3">
        <label for="">Email</label>
        <input type="text" name="email" class="form-control" >
        @if($errors->has('email'))
            <p class="text-danger">{{ $errors->first('email')}}</p>
        @endif
    </div>
    
    <div class="mb-3">
        <label for="">Phone Number</label>
        <input type="text" name="phone_number" class="form-control" >
        @if($errors->has('phone_number'))
            <p class="text-danger">{{ $errors->first('phone_number')}}</p>
        @endif
    </div>

    
    <button type="submit" class="btn btn-outline-success">Submit</button>
 </form>

@endsection