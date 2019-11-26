@extends('layouts.app')

@section('content')
    @component('components.panel', [
    ])
        <div class="text-center">
            <div class="card bg-light rounded-lg shadow-xl mx-1 my-5 m-md-5 py-4 px-2">
                <h2 class="p-1"><span class="tests-count">{{ $testCount['approuve'] }}</span> tests approuvés ✅</h2>
                <h2 class="p-1"><span class="tests-count">{{ $testCount['pending'] }}</span> en attente d'approbation ⌛</h2>
            </div>
            <div class="mb-5">
                <h3 class="mb-4">Accéder à l'application</h3>
                <a class="btn btn-primary btn-xl" href="{{route('github.login')}}">
                    Connexion avec GitHub
                    @svg('icon-github', ['class' => 'icon github-logo'])
                </a>
            </div>

            <div class="mb-5">
                <h3 class="mb-4">Use Cases</h3>
                <h4 class="mb-2 p-0">🔹 Proposez des tests</h4>
                <h4 class="mb-2 p-0">🔹 Donnez votre avis, débusquez les bugs</h4>
                <h4 class="mb-2 p-0">🔹 Récupérez la suite de tests</h4>
                <h4 class="mb-2 p-0">🔹 Intégration dans votre projet en quelques clics</h4>
            </div>

            <div class="mb-5">
                <h3 class="">Screenshots</h3>
                @foreach ( $screenshotsPaths->chunk(2) as $screenshots)
                    <div class="row">
                        @foreach ($screenshots as $screenshot)
                            <div class="col-sm-6 p-4">
                                <a href="{{ asset('storage/img/'.$screenshot) }}" target="_blank">
                                    <img src="{{ asset('storage/img/'.$screenshot) }}" class="screenshot img-fluid shadow rounded" alt="Responsive image">
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>

    @endcomponent

@endsection
