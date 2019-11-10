@extends('layouts.app')

@section('content')
    @component('components.panel', [
        'title' => 'Réglages',
        'icon' => 'cog',
    ])

        <h3>Génération de la suite de tests</h3>
        <a href="{{ route('admin.generer') }}" class="btn btn-primary">Générer le zip</a>

    @endcomponent

    <div class="d-flex flex-column mt-5">
        <h3 class="ml-md-5 mb-4">Le coin des admins:</h3>
        @component('components.disqus')
        @endcomponent
    </div>
@endsection
