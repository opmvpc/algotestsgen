@extends('layouts.app')

@section('content')

    <div class="panel {{ isset($class) ? $class : '' }}">
        <h2>
            <ion-icon name="ios-apps"></ion-icon>
            Liste des Tests
        </h2>

        <div class="mt-5">
            <div class="row">
                @foreach ($tests as $test)
                    <div class="col col-4 mb-5">
                        <div class="test-card bg-white mx-0 shadow-lg rounded p-4">

                            <div class="pb-3">
                                <h4 class="pb-2">
                                    {{ $test->nom }}
                                </h4>

                                <div class="avatar mb-3">
                                    <img src="{{ request()->user()->avatar }}" class="align-self-center mr-1 rounded-circle" alt="{{ request()->user()->avatar }}">
                                    Proposé par <b>{{ request()->user()->name }}</b>
                                </div>

                                <div class="">
                                    @if ($test->est_approuve)
                                        <span class="badge badge-pill badge-success">
                                            <ion-icon name="ios-checkmark"></ion-icon>
                                            Approuvé
                                        </span>
                                    @else
                                        <span class="badge badge-pill badge-warning">
                                            <ion-icon name="ios-close"></ion-icon>
                                            Pas encore approuvé
                                        </span>
                                    @endif
                                </div>
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
                                <a href="{{ route('tests.show', $test) }}" class="btn-link">Détails du test</a>
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