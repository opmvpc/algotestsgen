@extends('layouts.app')

@section('content')
    @component('components.panel', [
        'title' => 'Proposer un test',
        'icon' => 'ios-apps',
    ])

        <form action="{{ route('tests.update', $test) }}" method="POST">
            @csrf
            @method('put')

            @component('components.inputs.select', [
                'name' => 'probleme_id',
                'label' => 'Problème',
                'options' => $problemes,
                'valeur' => $test->probleme->id,
            ])
            @endcomponent

            @component('components.inputs.text', [
                'name' => 'nom',
                'placeholder' => 'Ex: D&CMauvaisFormatEspacesEnTrop',
            ])
                {{$test->nom}}
            @endcomponent

            @component('components.inputs.text', [
                'name' => 'resultat',
                'label' => 'Résultat',
                'placeholder' => 'Ex: null ou {1, 2, 3}',
            ])
                {{$test->resultat}}
            @endcomponent

            @component('components.inputs.textarea', [
                'name' => 'body',
                'label' => 'Fichier',
                'rows' => 20,
            ]){{$test->body}}@endcomponent

            @component('components.buttons.submit')
            @endcomponent
        </form>

    @endcomponent
@endsection