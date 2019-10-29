<div class="form-group">
    <label for="{{ $name }}">{{ isset($label) ? $label : title_case($name) }}</label>
    <input
        type="number"
        class="form-control {{ $errors->has($name) ? ' is-invalid' : '' }}"
        name="{{ $name }}"
        id="{{ $name }}"
        min="{{ isset($min) ? $min : 0 }}"
        max="{{ isset($max) ? $max : 100 }}"
        step="{{ isset($step) ? $step : 1 }}"
        value="{{ old($name, (isset($valeur) ? $valeur : null)) }}"
        placeholder="{{ isset($placeholder) ? $placeholder : '' }}"
    >
    @if ($errors->has($name))
        <div class="invalid-feedback">
            {{ $errors->first($name) }}
        </div>
    @endif
</div>