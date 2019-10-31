<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Partagez facilement les tests du projet d'algo | {{ config('app.name') }}</title>
    @include('layouts.seo')
</head>
<body>

    <div class="d-flex w-100" id="wrapper">

        @include('layouts.sidebar')

        <div id="page-content-wrapper">

            @include('layouts.nav')

            <div id="app" class="container-fluid h-100">
                @yield('content')
            </div>

            <a href="#" id="scroll-top">
                <ion-icon name="ios-arrow-up"></ion-icon>
            </a>

            @include('layouts.footer')

        </div>

    </div>

    <script type="text/javascript">
        window.ok = "{{ session('ok') }}";
        window.error = "{{ $errors->first() }}";
    </script>

    <script src="https://unpkg.com/ionicons@4.4.4/dist/ionicons.js"></script>

    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')

</body>
</html>