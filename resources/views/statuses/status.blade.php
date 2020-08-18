<li class="status mt-5">
    <img src="{{$user->avatar}}" alt="{{$user->name}}" class="">
    <div class="d-inline ml-3">{{$user->name}}</div>
    <div class="d-inline ml-3">{{$status->created_at->diffForHumans()}}</div>
    @if(Auth::id()===$user->id)
    @can('destroy',$status)
    <form method="POST" action="{{route('statuses.destroy',$status)}}" class="d-inline float-right">
        @csrf
        @method('delete')
        <button class="btn btn-danger">Delete</button>
    </form>
    @endcan
    @else
    @if(Auth::user()->isFollowing($user))
    @can('unfollow',$user)
    <form method="POST" action="{{route('followers.destroy',$user)}}" class="d-inline float-right">
        @csrf
        @method('delete')
        <button class="btn btn-warning">Unfollow</button>
    </form>
    @endcan
    @else
    <form method="POST" action="{{route('followers.store',$user)}}" class="d-inline float-right">
        @csrf
        <button class="btn btn-primary">Follow</button>
    </form>
    @endif
    <div>{{$status->content}}</div>
    @endif

</li>