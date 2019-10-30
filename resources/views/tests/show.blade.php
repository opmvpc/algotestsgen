@extends('layouts.app')

@section('content')
    @component('components.panel', [
        'title' => 'Test',
        'icon' => 'ios-apps',
    ])

        <div class="d-flex justify-content-between">
            <h4 class="pt-0 pb-2">
                {{ $test->nom }}
            </h4>
            @component('components.badge', ['test' => $test])
            @endcomponent
        </div>

        <div class="mb-3 text-muted">
                {{ $test->probleme->nom }}
        </div>

        <div class="avatar mb-3">
            <img src="{{ $test->user->avatar }}" class="align-self-center mr-1 rounded-circle" alt="{{ $test->user->avatar }}">
            Proposé par <b>{{ $test->user->name }}</b>
        </div>

        @component('components.inputs.textarea', [
            'name' => 'Fichier',
            'rows' => 10,
            'value' => $test->body,
        ])
        @endcomponent

        @component('components.inputs.text', [
            'name' => 'Résultat',
        ])
            {{ $test->resultat }}
        @endcomponent


        @if (Gate::allows('access-admin', $test))
        <a href="{{ route('approuver', $test) }}" class="btn {{$test->est_approuve ? 'btn-danger' : 'btn-success'}} mr-3">{{$test->est_approuve ? 'Désapprouver' : 'Approuver'}}</a>
        @endif

    @endcomponent

    <div class="m-5">
        <div id="disqus_thread"></div>
    </div>

    <script>

        /**
        *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
        *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
        /*
        var disqus_config = function () {
        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };
        */
        (function() { // DON'T EDIT BELOW THIS LINE
        var d = document, s = d.createElement('script');
        s.src = 'https://algo-choboai.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

@endsection

@section('scripts')
    <script id="dsq-count-scr" src="//algo-choboai.disqus.com/count.js" async></script>
@endsection
