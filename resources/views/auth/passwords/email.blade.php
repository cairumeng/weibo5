@extends('layouts.default')
@section('content')
<form method="POST" action="{{route('password.email')}}" class="col-md-6 offset-md-3 mt-5">
    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="email" name="email">
    </div>
    <button type="submit" class="btn btn-primary">Send</button>
</form>
@stop