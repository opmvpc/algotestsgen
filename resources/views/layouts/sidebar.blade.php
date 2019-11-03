<div class="bg-light border-right" id="sidebar-wrapper">

    <div class="sidebar-heading text-center"></div>

    <div class="list-group list-group-flush">

        @guest
            @component('components.buttons.navlink', [
                'route' => route('home'),
                'regex' => '/',
                'icon' => 'lock-open',
            ])
                Connexion
            @endcomponent
        @endguest

        @auth
            @component('components.buttons.navlink', [
                'route' => route('home'),
                'regex' => 'home',
                'icon' => 'home',
            ])
                Accueil
            @endcomponent

            @component('components.buttons.navlink', [
                'route' => route('tests.index'),
                'regex' => 'tests*',
                'icon' => 'monitor',
            ])
                Tests
            @endcomponent

            @component('components.buttons.navlink', [
                'route' => route('users.index'),
                'regex' => 'users*',
                'icon' => 'user-group',
            ])
                Utilisateurs
            @endcomponent

            @if (request()->user()->est_admin)
                @component('components.buttons.navlink', [
                    'route' => route('admin.index'),
                    'regex' => 'admin*',
                    'icon' => 'cog',
                ])
                    Réglages
                @endcomponent
            @endif
        @endauth

        @component('components.buttons.navlink', [
            'route' => route('faq'),
            'regex' => 'comment-ca-marche',
            'icon' => 'help',
        ])
            Comment ça marche?
        @endcomponent

    </div>
</div>
