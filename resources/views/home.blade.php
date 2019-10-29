@extends('layouts.app')

@section('content')
    @component('components.panel', [
        'title' => 'Bienvenue '. request()->user()->name .',',
        'icon' => 'ios-home',
    ])

        Récupérer la suite de tests
        @if ($zipDispo)
            <a href="{{ route('home.dl') }}" class="btn btn-primary">Télécharger le Zip</a>
        @else
            Les tests n'ont pas encore été générés.
        @endif
        <br>
        Proposer un test
        <br>
        Voir la liste des tests

    @endcomponent
@endsection