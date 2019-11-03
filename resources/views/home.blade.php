@extends('layouts.app')

@section('content')
    @component('components.panel', [
        'title' => 'Bienvenue '. request()->user()->name .',',
        'icon' => 'home',
    ])
        <h3>Récupérer la suite de tests</h3>
        <p>
            <span class="tests-count">{{ $testCount['approuve'] }}</span> tests approuvés ✅ et <span class="tests-count">{{ $testCount['pending'] }}</span> en attente d'approbation ⌛
        </p>
        <p class="mb-4">
            La structure du dossier de test est respectée, il suffit de décompresser l'archive et de coller le dossier <code>test</code> dans votre projet ✨
        </p>
        @if ($zipDispo)
            <a href="{{ route('home.dl') }}" class="btn btn-primary">Télécharger le Zip</a>
        @else
            Les tests n'ont pas encore été générés.
        @endif

        <hr>

        <h3>Proposer un test</h3>
        <p class="mb-4">Votre test sera accepté après validation par les autres étudiants</p>
        <a href="{{ route('tests.create') }}" class="btn btn-primary">Proposer un test</a>

        <hr>

        <h3>Votre avis compte!</h3>
        <p class="mb-4">
            N'hésitez pas à proposer des idées d'améliorations de l'application.
            <br>
            PR's are welcome! 👌
            <br>
            Si vous découvrez un bug 😱, ouvrez un ticket sur le GitHub du projet svp.
        </p>
        <a href="https://github.com/opmvpc/algotestsgen" target="_blank" class="btn btn-primary">GitHub du projet @svg('icon-github', ['class' => 'icon github-logo'])</a>
    @endcomponent
@endsection
