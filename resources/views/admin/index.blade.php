@extends('layouts.app')

@section('content')
    @component('components.panel', [
        'title' => 'Réglages',
        'icon' => 'cog',
    ])

        <h3>Génération de la suite de tests</h3>
        <a href="{{ route('admin.generer') }}" class="btn btn-primary">Générer le zip</a>

    @endcomponent
@endsection
