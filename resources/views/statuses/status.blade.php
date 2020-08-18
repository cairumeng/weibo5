<li class="">
    <img src="{{$user->avatar}}" alt="{{$user->name}}" class="">
    <div class="d-inline">{{status->created_at->diffForHumans()}}</div>
    <div>$status->content</div>
</li>