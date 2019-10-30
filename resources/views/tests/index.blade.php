@extends('layouts.app')

@section('content')

    <div class="panel {{ isset($class) ? $class : '' }}">

        <div class="d-flex justify-content-between">
            <h2>
                <ion-icon name="ios-apps"></ion-icon>
                Liste des Tests
            </h2>

            <a href="{{ route('tests.create') }}" class="btn btn-link text-right">Proposer un test</a>
        </div>

        <div class="d-flex mt-3 justify-content-between flex-column flex-lg-row align-items-center">
            <div class="mb-sm-4 mb-lg-0 text-center">
                <a href="{{ route('tests.index', ['probleme' => '1']) }}" class="btn mr-3 btn-sm mb-3 mb-sm-0">Diviser pour régner</a>
                <a href="{{ route('tests.index', ['probleme' => '2']) }}" class="btn mr-3 btn-sm mb-3 mb-sm-0">Programmation dynamique</a>
                <a href="{{ route('tests.index', ['probleme' => '3']) }}" class="btn mr-3 btn-sm mb-3 mb-sm-0">Algo glouton</a>
            </div>
            <div>
                <form action="{{ route('tests.index') }}" method="GET" class="d-flex
                align-items-center py-10">
                    @component('components.inputs.recherche', [
                        'name' => 'recherche',
                        'placeholder' => 'Votre recherche...'
                    ])

                    @endcomponent
                    <button type="submit" class="btn-search btn btn-primary py-2">Go!</button>
                </form>
            </div>
        </div>

        <div class="mt-3">
            <div class="row">
                @forelse ($tests as $test)
                    <div class="col col-12 col-md-6 col-lg-6 col-xl-4 mb-5">
                        <div class="test-card bg-white mx-0 shadow-lg rounded p-4">

                            <div class="pb-3">
                                <h4 class="pb-2">
                                    {{ $test->nom }}
                                </h4>

                                <div class="mb-3 text-muted">
                                        {{ $test->probleme->nom }}
                                </div>

                                <div class="avatar mb-3">
                                    <img src="{{ $test->user->avatar }}" class="align-self-center mr-1 rounded-circle" alt="{{ $test->user->avatar }}">
                                    Proposé par <b>{{ $test->user->name }}</b>
                                </div>

                                @component('components.badge', ['test' => $test])
                                @endcomponent
                            </div>

                            @component('components.inputs.textarea', [
                                'name' => 'fichier',
                                'id' => 'fichier-'.$loop->iteration,
                                'rows' => 10,
                                'value' => $test->body,
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
