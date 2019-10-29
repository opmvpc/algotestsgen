<a
    href="{{ $route }}"
    class="list-group-item list-group-item-action bg-light text-center {{ request()->is($regex) ? 'active' : '' }}"
>
    <div class="d-block">
        <ion-icon name="{{ $icon }}"></ion-icon>
    </div>
    <div class="d-block">
        {{ $slot }}
    </div>
</a>