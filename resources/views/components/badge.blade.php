<div class="">
    @if ($test->est_approuve)
        <span class="badge badge-pill badge-success">
            @svg('icon-check')
            Approuvé
        </span>
    @else
        <span class="badge badge-pill badge-warning">
            @svg('icon-close')
            Pas encore approuvé
        </span>
    @endif
</div>
