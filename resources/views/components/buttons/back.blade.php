<a
    {!! isset($route) ? "href=\"$route\"" : 'href="#" onclick="window.history.back();"' !!}
    class="btn btn-link {{ isset($class) ? $class : '' }}"
>Retour</a>