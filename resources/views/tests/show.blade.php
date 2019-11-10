@extends('layouts.app')

@section('content')
    @component('components.panel', [
        'title' => 'Commenter',
        'icon' => 'monitor',
    ])

        <div class="d-flex justify-content-between">
            <h4 class="pt-0 pb-2">
                {{ $test->nom }}
            </h4>
            @component('components.badge', ['test' => $test])
            @endcomponent
        </div>

        <div class="mb-3 text-muted">
                {{ $test->probleme->nom }}
        </div>

        <div class="avatar mb-3">
            <img src="{{ $test->user->avatar }}" class="align-self-center mr-1 rounded-circle" alt="{{ $test->user->avatar }}">
            Proposé par <b>{{ $test->user->name }}</b>
        </div>

        @component('components.code', ['code' => $test->body])
        @endcomponent

        @component('components.resultat', ['code' => $test->resultat])
        @endcomponent

        <div class="row ml-0">
            @component('components.buttons.approuver', [
                'test' => $test,
                ])
            @endcomponent

            @component('components.buttons.modifier', [
                'test' => $test,
                ])
            @endcomponent
        </div>

    @endcomponent

    <div class="d-flex flex-column mt-5">
        <h3 class="ml-md-5 mb-4">Commentaires pour ce test:</h3>
        @component('components.disqus')
        @endcomponent
    </div>

@endsection
