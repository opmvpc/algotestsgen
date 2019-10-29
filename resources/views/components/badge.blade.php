<div class="">
    @if ($test->est_approuve)
        <span class="badge badge-pill badge-success">
            <ion-icon name="ios-checkmark"></ion-icon>
            <span class="text-badge">Approuvé</span>
        </span>
    @else
        <span class="badge badge-pill badge-warning">
            <ion-icon name="ios-close"></ion-icon>
            <span class="text-badge">Pas encore approuvé</span>
        </span>
    @endif
</div>
