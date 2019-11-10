@if (Gate::allows('update-test', $test))
    <a href="{{ route('tests.edit', $test) }}" class="btn-link mr-2 py-2">Modifier</a>
@endif
