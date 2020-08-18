<img src="{{$user->avatar}}" alt="{{$user->name}}" class="">
<div class="row">
    <div class="col-md-4">
        <a href="{{route('users.show',$user)}}" class="">
            <h5>Statuses</h5>
            {{$user->Statuses()->count()}}
        </a>
    </div>
    <div class="col-md-4">
        <a href="{{route('users.followers',$user)}}" class="">
            <h5>Followers</h5>
            {{$user->followers()->count()}}
        </a>
    </div>
    <div class="col-md-4">
        <a href="{{route('users.followings',$user)}}" class="">
            <h5>Followings</h5>
            {{$user->followings()->count()}}
        </a>
    </div>
</div>