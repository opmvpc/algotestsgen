@extends('layouts.app')

@section('content')
    @component('components.panel', [
        'title' => 'Administration',
        'icon' => 'ios-color-wand',
    ])

        <h3>Génération de la suite de test</h3>
        <p>

        </p>
        <a href="{{ route('admin.generer') }}" class="btn btn-primary">Générer le code</a>

    @endcomponent
@endsection