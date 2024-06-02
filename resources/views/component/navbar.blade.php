<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a href="{{ url('/') }}" class="navbar-brand px-5">
        <img class="group-2" width="auto" height="50" src="{{ asset('assets/group-3-2.png') }}" />
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto px-5">
            <li class="nav-item active text-bold">
                <a class="nav-link" href="{{ url('/') }}">Home</a>
            </li>
            <li class="nav-item active text-bold">
                <a class="nav-link" href="#">Hubungi</a>
            </li>
        </ul>
    </div>
</nav>
