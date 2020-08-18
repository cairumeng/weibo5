@extends('layouts.default')
@section('content')
<div class="form-group col-md-6">
    <textarea class="form-control" placeholder="Post your blog here!" rows="3"></textarea>
    <button class="btn btn-primary mt-3">Submit</button>
</div>
<section class="statuses">
    <ul class="unstyled">
        @foreach($statuses as $status)
        @include('statuses.status')
        @endforeach
    </ul>
</section>
@stop