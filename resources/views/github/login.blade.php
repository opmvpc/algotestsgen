@extends('layouts.app')

@section('content')
    @component('components.panel', [
    ])
        <div class="text-center">
            <div class="card bg-light rounded-lg shadow-xl mx-1 my-5 m-md-5 py-4 px-2">
                <h1 class="p-1"><b>{{ $testCount['approuve'] }}</b> tests approuvés ✅</h1>
                <h1 class="p-1"><b>{{ $testCount['pending'] }}</b> en attente d'approbation ⌛</h1>
            </div>
            <div class="mb-5">
                <h3 class="mb-4">Use Cases</h3>
                <h4 class="mb-2 p-0">Proposez des tests</h4>
                <h4 class="mb-2 p-0">Donnez votre avis, débusquez les bugs</h4>
                <h4 class="mb-2 p-0">Récupérez la suite de tests</h4>
            </div>

            <div class="mb-5">
                <h3 class="mb-4">Accéder à  l'application</h3>
                <a class="btn btn-primary btn-xl" href="{{route('github.login')}}">
                    Connexion avec GitHub
                    <ion-icon name="logo-github"></ion-icon>
                </a>
            </div>

            <div class="mb-5">
                <h3 class="">Screenshots</h3>
                <div class="row">
                    <div class="col-sm-6 p-4">
                        <img src="{{ asset('storage/img/algotesthome.png') }}" class="img-fluid" alt="Responsive image">
                    </div>
                    <div class="col-sm-6 p-4">
                        <img src="{{ asset('storage/img/algotestproposer.png') }}" class="img-fluid" alt="Responsive image">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 p-4">
                        <img src="{{ asset('storage/img/algotestliste.png') }}" class="img-fluid" alt="Responsive image">
                    </div>
                    <div class="col-sm-6 p-4">
                        <img src="{{ asset('storage/img/algotestcommenter.png') }}" class="img-fluid" alt="Responsive image">
                    </div>
                </div>
            </div>
        </div>

    @endcomponent

@endsection
