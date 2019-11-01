<div class="bg-light border-right" id="sidebar-wrapper">

    <div class="sidebar-heading text-center"></div>

    <div class="list-group list-group-flush">

        @guest
            @component('components.buttons.navlink', [
                'route' => route('home'),
                'regex' => '/',
                'icon' => 'ios-log-in',
            ])
                Connexion
            @endcomponent
        @endguest

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

            @component('components.buttons.navlink', [
                'route' => route('users.index'),
                'regex' => 'users*',
                'icon' => 'ios-people',
            ])
                Utilisateurs
            @endcomponent

            @if (request()->user()->est_admin)
                @component('components.buttons.navlink', [
                    'route' => route('admin.index'),
                    'regex' => 'admin*',
                    'icon' => 'ios-cog',
                ])
                    Réglages
                @endcomponent
            @endif
        @endauth

        @component('components.buttons.navlink', [
            'route' => route('faq'),
            'regex' => 'comment-ca-marche',
            'icon' => 'ios-help-circle',
        ])
            Comment ça marche?
        @endcomponent

    </div>
</div>
