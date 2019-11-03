@extends('layouts.app')

@section('content')
    @component('components.panel', [
        'title' => 'Comment ça marche?',
        'icon' => 'help',
    ])

        <div class="row">
            <div class="col col-md-6 mb-4 mb-lg-0">
                <h3>Workflow</h3>
                <ol>
                    <li>Proposez des tests</li>
                    <li>Commentez, proposez des corrections aux tests</li>
                    <li>Les tests sont approuvés par les admins</li>
                    <li>Lorsqu'un test est approuvé, le zip à télécharger est re-généré</li>
                    <li>Remplacez le dossier <code>1920_IHDCB331_GXX/src/test/</code> de votre projet par celui contenu dans le zip</li>
                    <li>Lancez les tests</li>
                    <li>...</li>
                    <li>Profit!</li>
                </ol>
            </div>
            <div class="col-xs-md col-lg-6 mb-4 mb-lg-0">
                <h3>Génération des tests</h3>
                <ol>
                    <li>La structure du dossier de test du projet est respectée</li>
                    <li>Les fichiers de test sont créés</li>
                    <li>Les classes de test Java sont créées</li>
                    <li>Les methodes de test JUnit sont créées</li>
                </ol>
                <span class="text-muted">(Ex: public void test_1_problem_1_naive_fail_fichier_vide())</span>
            </div>
        </div>

        <div class="row">
            <div class="p-4">
                <a href="{{ asset('storage/img/idea.png') }}" target="_blank">
                    <img src="{{ asset('storage/img/idea.png') }}" class="img-fluid shadow-lg rounded" alt="Responsive image">
                </a>
            </div>
        </div>

    @endcomponent
@endsection
