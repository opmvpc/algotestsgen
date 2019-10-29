@php
    $url = '';

    if (! isset($route)) {
        $url = '';
    } else if (starts_with($route, 'http')) {
        $url = $route;
    } else if ($route === '#') {
        $url = $route;
    } else {
        $url = route($route);
    }

    if (! isset($route) && isset($ancre)) {
        $url = '#' . $ancre;
    } else if (isset($ancre)) {
        $url = $url . '#' . $ancre;
    }
@endphp

<a
    href="{{ $url }}"
    class="{{ isset($class) ? $class : 'btn btn-link' }}"
    {{ isset($target) && $target == true ? 'target="_blank"' : '' }}
>
    {{ $slot }}
</a>