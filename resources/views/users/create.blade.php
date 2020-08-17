@extends('layouts.default')
@section('content')
<form method="POST" action="{{route('users.store')}}" class="col-md-6 offset-md-3 mt-5">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input class="form-control" id="name" value="{{ old('name')}}">
    </div>
    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email" value="{{ old('email')}}">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password">
    </div>
    <div class="form-group">
        <label for="password_confirmation">Password</label>
        <input type="password" class="form-control" id="password_confirmation">
    </div>
    <button type="submit" class="btn btn-primary">Register</button>
</form>
@stop