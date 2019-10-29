@extends('layouts.app')

@section('content')
    @component('components.panel', [
        'title' => 'Bienvenue '. request()->user()->name .',',
        'icon' => 'ios-home',
    ])
        <h3>Récupérer la suite de tests</h3>
        <p class="mb-4">
            La structure du dossier de test est respectée, il suffit de décompresser l'archive et de coller le dossier <code>test</code> dans votre projet 🎉
        </p>
        @if ($zipDispo)
            <a href="{{ route('home.dl') }}" class="btn btn-primary">Télécharger le Zip</a>
        @else
            Les tests n'ont pas encore été générés.
        @endif

    @endcomponent
@endsection
