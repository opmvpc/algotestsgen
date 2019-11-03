@extends('layouts.app')

@section('content')
    @component('components.panel', [
        'title' => 'Modifier un test',
        'icon' => 'monitor',
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
                'placeholder' => 'Ex: mauvais nombre de colonnes',
            ])
                {{$test->nom}}
            @endcomponent

            @component('components.inputs.text', [
                'name' => 'resultat',
                'label' => 'Résultat',
                'placeholder' => 'Ex: null ou {"1", "2", "3"}',
            ])
                {{$test->resultat}}
            @endcomponent

            @component('components.inputs.textarea', [
                'name' => 'body',
                'label' => 'Fichier',
                'rows' => 20,
                'value' => $test->body,
            ])
            @endcomponent


            {{-- <textarea name="body" id="body" rows="10" class="w-100 rounded">{!!$test->body!!}</textarea> --}}

            @component('components.buttons.submit')
            @endcomponent
        </form>

    @endcomponent
@endsection
