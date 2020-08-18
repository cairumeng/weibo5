@extends('layouts.default')
@section('content')
<section class="followers">
    <ul class="list-unstyled">
        @foreach($followers as $follower)
        <li class="status mt-5">
            <img src="{{$follower->avatar}}" alt="{{$follower->name}}" class="">
            <h5 class="d-inline ml-5 ">{{$follower->name}}</h5>
            @if(Auth::user()->isFollowing($follower))
            @can('unfollow',$follower)
            <form method="POST" action="{{route('followers.destroy',$follower)}}" class="d-inline float-right">
                @csrf
                @method('delete')
                <button class="btn btn-warning">Unfollow</button>
            </form>
            @endcan
            @else
            <form method="POST" action="{{route('followers.store',$follower)}}" class="d-inline float-right">
                @csrf
                <button class="btn btn-primary">Follow</button>
            </form>
            @endif
        </li>
        @endforeach
    </ul>
    {{ $followers->links() }}
</section>
@stop