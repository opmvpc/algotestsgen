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

        <div class="mt-5">
            <div class="row">
                @foreach ($tests as $test)
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
                                'name' => 'Fichier',
                                'rows' => 10,
                            ])
                                {{ $test->body }}
                            @endcomponent

                            @component('components.inputs.text', [
                                'name' => 'Résultat',
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
                @endforeach
            </div>

            <div class="d-flex justify-content-center">
                {{$tests->links()}}
            </div>
        </div>
    </div>
@endsection
