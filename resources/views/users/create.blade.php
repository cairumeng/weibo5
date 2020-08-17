@extends('layouts.default')
@section('content')
<form method="POST" action="{{route('users.store')}}" class="col-md-6 offset-md-3 mt-5">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input class="form-control" id="name" name="name" value="{{ old('name')}}">
        @if($errors->has('name'))
        <div class="text-danger">{{$errors->first('name')}}</div>
        @endif
    </div>
    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ old('email')}}">
        @if($errors->has('email'))
        <div class="text-danger">{{$errors->first('email')}}</div>
        @endif
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" id="password">
        @if($errors->has('password'))
        <div class="text-danger">{{$errors->first('password')}}</div>
        @endif
    </div>
    <div class="form-group">
        <label for="password_confirmation">Password</label>
        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
    </div>
    <button type="submit" class="btn btn-primary">Register</button>
</form>
@stop