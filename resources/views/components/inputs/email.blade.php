<div class="form-group">
    <label for="{{ $name }}">{{ isset($label) ? $label : title_case($name) }}</label>
    <input
        type="email"
        class="form-control {{ $errors->has($name) ? ' is-invalid' : '' }}"
        name="{{ $name }}"
        id="{{ $name }}"
        value="{{ old($name, $slot) }}"
        placeholder="{{ isset($placeholder) ? $placeholder : '' }}"
    >
    @if ($errors->has($name))
        <div class="invalid-feedback">
            {{ $errors->first($name) }}
        </div>
    @endif
</div>