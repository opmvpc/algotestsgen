<div class="form-group mb-0">
    <input
        type="text"
        class="form-control {{ $errors->has($name) ? ' is-invalid' : '' }}"
        name="{{ $name }}"
        id="{{ $name }}"
        value="{{ old($name, request()->query('recherche')) }}"
        placeholder="{{ isset($placeholder) ? $placeholder : '' }}"
    >
    @if ($errors->has($name))
        <div class="invalid-feedback">
            {{ $errors->first($name) }}
        </div>
    @endif
</div>
