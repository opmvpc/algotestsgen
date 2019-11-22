@extends('layouts.app')

@section('content')
    @component('components.panel', [
        'title' => 'Proposer un test',
        'icon' => 'monitor',
    ])

        <form action="{{ route('tests.store') }}" method="POST">
            @csrf

            @component('components.inputs.select', [
                'name' => 'probleme_id',
                'label' => 'Problème',
                'options' => $problemes,
                'valeur' => request()->has('probleme') ? request()->query('probleme') : '',
            ])
            @endcomponent

            @component('components.inputs.text', [
                'name' => 'nom',
                'placeholder' => 'Ex: mauvais nombre de colonnes',
            ])
            @endcomponent

            @component('components.inputs.text', [
                'name' => 'resultat',
                'label' => 'Résultat',
                'placeholder' => 'Ex: null ou {"1", "2", "3"}',
            ])
            @endcomponent

            <pre id="resultat"></pre>

            @component('components.inputs.textarea', [
                'name' => 'body',
                'label' => 'Fichier',
                'rows' => 10,
            ])
            @endcomponent

            @component('components.buttons.submit')
            @endcomponent
        </form>

    @endcomponent
@endsection
