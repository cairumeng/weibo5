@extends('layouts.default')
@section('content')
<section class="statuses">
    <ul class="list-unstyled">
        @foreach($statuses as $status)
        @include('statuses.status',['user'=>$status->user])
        @endforeach
    </ul>
    {{ $statuses->links() }}
</section>
@stop