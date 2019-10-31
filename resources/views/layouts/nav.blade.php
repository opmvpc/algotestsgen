<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">


    <button class="btn btn-primary" id="menu-toggle">
        <ion-icon name="menu"></ion-icon>
    </button>

    <span class="brand mr-2 mr-sm-0">
        {{ config('app.name') }}
    </span>

    @auth
        <button
            class="btn-more btn btn-light mr-2 d-md-none"
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <ion-icon name="more"></ion-icon>
        </button>
    @endauth

    @auth
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a href="{{ route('logout') }}"
                        class="nav-link"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Se déconnecter<span class="sr-only">(current)</span></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </div>
    @endauth
</nav>
