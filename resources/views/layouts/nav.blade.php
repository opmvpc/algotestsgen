<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">


    <button class="btn btn-primary" id="menu-toggle">
        <ion-icon name="menu"></ion-icon>
    </button>

    <span class="brand">
        {{ config('app.name') }}
    </span>

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

    @auth
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="#">Se déconnecter <span class="sr-only">(current)</span></a>
            </li>
        </ul>
    </div>
    @endauth
</nav>