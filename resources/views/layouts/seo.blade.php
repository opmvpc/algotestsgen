    <meta property="og:type" content="website" />
    <meta property="og:locale" content="fr_FR" />
    <meta property="og:site_name" content="Algo Tests Generator" />
    <meta property="og:url" content="{{ url()->full() }}" />
    <meta property="og:title" content="Algo Tests Generator" />
    <meta property="og:author" content="opmvpc" />
    <meta property="og:section" content="Entertainment" />
    <meta property="og:image" content="{{ asset('storage/img/algotesthome.png') }}" />
    @php
        $testCount = \App\Models\Test::stats();
        $description = 'Partagez facilement les tests du projet d\'algo: ';
        $description .= $testCount['approuve'] .' tests approuvés ✅ & ';
        $description .= $testCount['pending'] .' en attente d\'approbation ⌛';
    @endphp
    <meta property="og:description" content="{!! $description !!}" />
    <meta name="description" content="{!! $description !!}" >

    <meta name="twitter:card" content="summary_large_image">
    <meta name="theme-color" content="#48BB78">