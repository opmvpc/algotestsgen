@extends('layouts.app')

@section('content')

    <div class="panel {{ isset($class) ? $class : '' }}">

        <div class="d-flex justify-content-between">
            <h2>
                    @svg('icon-monitor', [])
                {{ $tests->toArray()['total'] }} Tests
            </h2>

            @guest
                <div class="alert alert-danger">
                    Vous devez vous connecter pour proposer ou commenter un test!
                </div>
            @endguest
            @auth
                <a href="{{ request()->has('probleme') ? route('tests.create', request()->only('probleme') ) : route('tests.create') }}" class="btn btn-link text-right">Proposer un test</a>
            @endauth
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
                    href="{{ route('tests.index', array_merge(['en_attente' => true], request()->only('recherche')) ) }}"
                    class="btn mr-3 btn-sm mb-3 {{ request()->query('en_attente') == true ? 'active' : ''}}"
                >
                    En attente
                </a>
                @foreach ($problemes as $index => $probleme)
                    <a
                        href="{{ route('tests.index', array_merge(['probleme' => $index], request()->only('recherche')) ) }}"
                        class="btn mr-3 btn-sm mb-3 {{ request()->query('probleme') == $index ? 'active' : ''}}"
                    >
                        {{ $probleme }}
                    </a>
                @endforeach
            </div>
            <div>
                <form action="{{ route('tests.index') }}" method="GET" class="d-flex
                align-items-center py-10 mb-3">

                    @if (request()->probleme)
                        <input type="hidden" name="probleme" value="{{ request()->probleme }}">
                    @endif

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
                        <div class="test-card bg-white mx-0 shadow-lg rounded p-4 d-flex flex-column h-100">

                            <div class="test-card-head pb-3">
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

                            @component('components.code', ['code' => $test->body])
                            @endcomponent

                            @component('components.resultat', ['code' => $test->resultat])
                            @endcomponent

                            <div class="actions text-right">
                                @component('components.buttons.modifier', [
                                    'test' => $test,
                                ])

                                @endcomponent
                                @auth
                                    <a href="{{ route('tests.show', $test) }}" class="btn-link">Commenter</a>
                                @endauth
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
