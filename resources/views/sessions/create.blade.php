@extends('layouts.default')
@section('content')
<form method="POST" action="{{route('sessions.store')}}" class="col-md-6 offset-md-3 mt-5">
    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        @if($errors->has('email'))
        <div class="text-danger">{{$errors->first('email')}}</div>
        @endif
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <span class=""><a href="{{route('password.request')}}" class="">(Password forgot?)</a></span>
        <input type="password" class="form-control" id="password" name="password">
    </div>

    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="remember_me" name="remember_me">
        <label class="form-check-label" for="remember_me">Remember me </label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@stop