@extends('layouts.app')

@section('content')

    <div class="panel {{ isset($class) ? $class : '' }}">

        <div class="d-flex justify-content-between">
            <h2>
                <ion-icon name="ios-people"></ion-icon>
                {{ $users->toArray()['total'] }} Utilisateurs
            </h2>
        </div>

        <div class="d-flex mt-3 justify-content-between flex-column flex-lg-row align-items-center">
            <div class="filtres mb-sm-4 mb-lg-0 text-center">
                <a href="{{ route('users.index') }}" class="btn mr-3 btn-sm mb-3 mb-sm-0 {{ request()->query('recherche') == '' && !request()->query('contributions') ? 'active' : ''}}">Tous</a>
                <a href="{{ route('users.index', ['contributions' => true]) }}" class="btn mr-3 btn-sm mb-3 mb-sm-0 {{ request()->query('contributions') == true ? 'active' : ''}}">Contributions</a>
            </div>
            <div>
                <form action="{{ route('users.index') }}" method="GET" class="d-flex
                align-items-center py-10">
                    @component('components.inputs.recherche', [
                        'name' => 'recherche',
                        'placeholder' => 'Votre recherche...'
                    ])

                    @endcomponent
                    <button type="submit" class="btn-search btn btn-primary py-2">Go!</button>
                </form>
            </div>
        </div>

        <div class="mt-3">
            <div class="row">
                @forelse ($users as $user)
                    <div class="col col-12 col-sm-6 col-lg-4 col-xl-3 mb-5">
                        <div class="test-card bg-white mx-0 shadow-lg rounded p-4">

                            <div class="">
                                <div class="avatar mb-3">
                                    <img src="{{ $user->avatar }}" class="align-self-center mr-1 rounded-circle" alt="{{ $user->avatar }}">
                                    <a href="https://github.com/{{ $user->name }}" class="btn btn-link" target="_blank">
                                        <h5 class="d-inline">{{ $user->name }}</h5>
                                    </a>
                                </div>
                                <h6 class="text-muted">
                                    {{ $user->testCount }} tests proposés
                                </h6>
                            </div>

                            @if (Gate::allows('access-admin'))
                                <hr class="mb-3 mt-4">
                                <div class="actions text-right">
                                    <a href="{{ route('users.admin', $user) }}" class="btn-link mr-2">{{ $user->est_admin ? 'Administrateur' : 'Utilisateur'}}</a>
                                    <a href="{{ route('users.bannir', $user) }}" class="btn-link mr-2 text-danger">{{ $user->est_banni ? 'Débannir' : 'Bannir'}}</a>
                                </div>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="alert alert-danger mx-auto mt-5">Pas de résultat 😱</div>
                @endforelse
            </div>

            <div class="d-flex justify-content-center">
                {{$users->links()}}
            </div>
        </div>
    </div>
@endsection
