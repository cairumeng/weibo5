<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Weibo</a>
    @auth
    <div class="nav-item dropdown ml-auto">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <img src="{{Auth::user()->avatar}}" alt="{{Auth::user()->name}}">
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">User Center</a>
            <a class="dropdown-item" href="#">Info edit</a>
            <div class="dropdown-divider"></div>
            <form method="POST" action="{{route('sessions.destroy')}}">
                @method('delete')
                @csrf
                <button type="submit" class="dropdown-item">Logout</button>
            </form>
        </div>
        @endauth
</nav>