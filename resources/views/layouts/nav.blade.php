<nav class="navbar navbar-expand-lg navbar-light sticky-top" style="background-color: #ffffff;">
    <a href="/" class="navbar-brand">
        <img src="http://static1.squarespace.com/static/557260bde4b01287f8acfd00/t/55726248e4b055140a0a9443/1500827433231/"
             width="130" height="130" alt="logo">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a href="/" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
                <a href="/visit/create" class="nav-link">Enroll</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link disabled">Contacts</a>
            </li>
        </ul>
    </div>

    <!-- Authentication Links -->
    @guest
        <div class="btn-group-vertical">
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        </div>
    @else
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()->name }} <span class="caret"></span>
            </button>
            <div class="dropdown-menu " aria-labelledby="dropdownMenuButton">
                <div class="btn-group-vertical">
                    <a href="/home">Account</a>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    @endguest
</nav>
