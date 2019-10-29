<div class="form-group">
    <label for="{{ $name }}">{{ isset($label) ? $label : title_case($name) }}</label>
    <input
        type="file"
        {{ isset($multiple) && $multiple === true ? 'multiple' : '' }}
        class="form-control-file {{ $errors->has($name) ? ' is-invalid' : '' }}"
        name="{{ isset($multiple) && $multiple === true ? $name .'[]' : $name }}"
        id="{{ $name }}"
        value="{{ old($name, $slot) }}"
    >
    @if ($errors->has($name))
        <div class="invalid-feedback">
            {{ $errors->first($name) }}
        </div>
    @endif
</div>