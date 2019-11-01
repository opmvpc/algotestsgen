@extends('layouts.app')

@section('content')

    <div class="panel {{ isset($class) ? $class : '' }}">

        <div class="d-flex justify-content-between">
            <h2>
                <ion-icon name="ios-apps"></ion-icon>
                {{ $tests->toArray()['total'] }} Tests
            </h2>

            <a href="{{ request()->has('probleme') ? route('tests.create', request()->only('probleme') ) : route('tests.create') }}" class="btn btn-link text-right">Proposer un test</a>
        </div>

        <div class="d-flex mt-4 justify-content-between flex-column flex-lg-row align-items-center">
            <div class="filtres mb-sm-4 mb-lg-0 text-center">
                <a
                    href="{{ route('tests.index') }}"
                    class="btn mr-3 btn-sm mb-3 {{ ! request()->has('probleme') && ! request()->has('en_attente') && request()->query('recherche') == '' ? 'active' : ''}}"
                >
                    Tous
                </a>
                <a
                    href="{{ route('tests.index', ['en_attente' => true]) }}"
                    class="btn mr-3 btn-sm mb-3 {{ request()->query('en_attente') == true ? 'active' : ''}}"
                >
                    En attente
                </a>
                @foreach ($problemes as $index => $probleme)
                    <a
                        href="{{ route('tests.index', ['probleme' => $index]) }}"
                        class="btn mr-3 btn-sm mb-3 {{ request()->query('probleme') == $index ? 'active' : ''}}"
                    >
                        {{ $probleme }}
                    </a>
                @endforeach
            </div>
            <div>
                <form action="{{ route('tests.index') }}" method="GET" class="d-flex
                align-items-center py-10 mb-3">
                    @component('components.inputs.recherche', [
                        'name' => 'recherche',
                        'placeholder' => 'Votre recherche...'
                    ])

                    @endcomponent
                    <button type="submit" class="btn-search btn btn-primary py-2">Go!</button>
                </form>
            </div>
        </div>

        <div class="mt-4">
            <div class="row m-0">
                @forelse ($tests as $test)
                    <div class="col col-12 col-md-6 col-lg-6 col-xl-4 mb-4 mb-lg-5 px-0 px-md-2">
                        <div class="test-card bg-white mx-0 shadow-lg rounded p-4">

                            <div class="pb-3">
                                <h4 class="pb-2">
                                    {{ $test->nom }}
                                </h4>

                                <div class="mb-3 text-muted">
                                        Problème {{ $test->probleme->id }}: {{ $test->probleme->nom }}
                                </div>

                                <div class="avatar mb-3">
                                    <img src="{{ $test->user->avatar }}" class="align-self-center mr-1 rounded-circle" alt="{{ $test->user->avatar }}">
                                    <span class="user-name">Proposé par <b>{{ $test->user->name }}</b></span>
                                </div>

                                @component('components.badge', ['test' => $test])
                                @endcomponent
                            </div>

                            @component('components.inputs.textarea', [
                                'name' => 'fichier',
                                'id' => 'fichier-'.$loop->iteration,
                                'rows' => 10,
                                'value' => $test->body,
                                'disabled' => true,
                            ])
                            @endcomponent

                            @component('components.inputs.text', [
                                'name' => 'resultat',
                                'id' => 'resultat-'.$loop->iteration,
                                'label' => 'Résultat',
                            ])
                                {{ $test->resultat }}
                            @endcomponent

                            <div class="actions text-right">
                                @if (Gate::allows('update-test', $test))
                                <a href="{{ route('tests.edit', $test) }}" class="btn-link mr-2">Modifier</a>
                                @endif
                                <a href="{{ route('tests.show', $test) }}" class="btn-link">Commenter</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-danger mx-auto mt-5">Pas de résultat 😱</div>
                @endforelse
            </div>

            <div class="d-flex justify-content-center">
                {{$tests->links()}}
            </div>
        </div>
    </div>
@endsection
