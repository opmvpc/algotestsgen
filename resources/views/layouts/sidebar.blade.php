<div class="bg-light border-right" id="sidebar-wrapper">

    <div class="sidebar-heading text-center"></div>

    <div class="list-group list-group-flush">

        @auth
            @component('components.buttons.navlink', [
                'route' => route('home'),
                'regex' => 'home',
                'icon' => 'ios-home',
            ])
                Accueil
            @endcomponent

            @component('components.buttons.navlink', [
                'route' => route('tests.index'),
                'regex' => 'tests*',
                'icon' => 'ios-apps',
            ])
                Tests
            @endcomponent

            @if (request()->user()->est_admin)
                @component('components.buttons.navlink', [
                    'route' => route('admin.index'),
                    'regex' => 'admin*',
                    'icon' => 'ios-color-wand',
                ])
                    Administration
                @endcomponent
            @endif
        @endauth

    </div>
</div>
