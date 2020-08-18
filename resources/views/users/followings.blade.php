@extends('layouts.default')
@section('content')
<section class="followers">
    <ul class="list-unstyled">
        @foreach($followings as $following)
        <li class="status mt-5">
            <img src="{{$following->avatar}}" alt="{{$following->name}}" class="">
            <h5 class="d-inline ml-5 ">{{$following->name}}</h5>
            @if(Auth::user()->isFollowing($following))
            @can('unfollow',$following)
            <form method="POST" action="{{route('followers.destroy',$following)}}" class="d-inline float-right">
                @csrf
                @method('delete')
                <button class="btn btn-warning">Unfollow</button>
            </form>
            @endcan
            @else
            <form method="POST" action="{{route('followers.store',$following)}}" class="d-inline float-right">
                @csrf
                <button class="btn btn-primary">Follow</button>
            </form>
            @endif
        </li>
        @endforeach
    </ul>
    {{ $followings->links() }}
</section>
@stop