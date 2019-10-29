@extends('layouts.app')

@section('content')
    @component('components.panel', [
        'title' => 'Bienvenue '. request()->user()->name .',',
        'icon' => 'ios-home',
    ])

        Récupérer la suite de tests
        <br>
        Proposer un test
        <br>
        Voir la liste des tests

    @endcomponent
@endsection