@extends('layouts.default')
@section('content')
<div class="row">
    <form method="POST" action="{{ route('statuses.store') }}" class=" col-md-6">
        @csrf
        <div class="form-group">
            <textarea name="content" class="form-control" placeholder="Post your blog here!" rows="3"></textarea>
            <button class="btn btn-primary mt-3">Submit</button>
        </div>

    </form>
    <div class="col-md-6 status text-center">
        @include('shared._user_info',['user'=>Auth::user()])
    </div>
</div>

<section class="statuses">
    <ul class="list-unstyled">
        @foreach($statuses as $status)
        @include('statuses.status',['user'=>$status->user])
        @endforeach
    </ul>
    {{ $statuses->links() }}
</section>
@stop