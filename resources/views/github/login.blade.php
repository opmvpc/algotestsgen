@extends('layouts.app')

@section('content')
    @component('components.panel', [
    ])

        <h3>Accéder à l'application</h3>
        <a class="btn btn-primary btn-xl" href="{{route('github.login')}}">
            Connexion avec GitHub
            <ion-icon name="logo-github"></ion-icon>
        </a>

    @endcomponent

@endsection
