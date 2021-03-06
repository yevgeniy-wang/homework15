<div>
    @if(request()->user())
        <a class="btn btn-secondary" href="{{ route('logout') }}">Logout</a>
    @else
        <a class="btn btn-secondary" href="{{ route('login') }}">Login</a>
    @endif
</div>
