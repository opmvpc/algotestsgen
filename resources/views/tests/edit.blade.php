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

            <pre id="resultat">Chargement...</pre>

            @component('components.inputs.textarea', [
                'name' => 'body',
                'label' => 'Fichier',
                'rows' => 10,
                'value' => $test->body,
            ])
            @endcomponent

            <div class="row ml-0">
                @component('components.buttons.submit')
                @endcomponent
                </form>

                @component('components.buttons.approuver', [
                    'test' => $test,
                    ])
                @endcomponent

                @if (Gate::allows('update-test', $test))
                    <form action="{{ route('tests.destroy', $test) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-link text-danger mr-3" onclick="confirm('Attention! Voulez-vous vraiment supprimer ce test?') ? null : event.preventDefault()">Supprimer</button>
                    </form>
                @endif
            </div>



    @endcomponent
@endsection
