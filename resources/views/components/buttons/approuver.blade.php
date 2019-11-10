@if (Gate::allows('access-admin', $test))
    <form action="{{ route('approuver', $test) }}" method="POST">
        @csrf

        <button type="submit" href="{{ route('approuver', $test) }}" class="btn {{$test->est_approuve ? 'btn-danger' : 'btn-success'}} mr-3">{{$test->est_approuve ? 'Désapprouver' : 'Approuver'}}</button>
    </form>
@endif
