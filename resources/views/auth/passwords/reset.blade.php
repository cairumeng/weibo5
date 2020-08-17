@extends('layouts.default')
@section('content')
<form method="POST" action="{{route('password.update')}}" class="col-md-6 offset-md-3 mt-5">
    @csrf
    <input type="hidden" name="email" value="{{$email}}">
    <input type="hidden" name="token" value="{{$token}}">
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" id="password">
        @if($errors->has('password'))
        <div class="text-danger">{{$errors->first('password')}}</div>
        @endif
    </div>
    <div class="form-group">
        <label for="password_confirmation">Password Confirmation</label>
        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
    </div>
    <button type="submit" class="btn btn-primary">Reset</button>
</form>
@stop