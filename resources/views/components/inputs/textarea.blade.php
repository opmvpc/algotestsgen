<div class="form-group">
    <label for="{{ $name }}">{{ isset($label) ? $label : Str::title($name) }}</label>
    <textarea
        type="text"
        class="form-control px-2 {{ $errors->has($name) ? ' is-invalid' : '' }}"
        name="{{ $name }}"
        id="{{ $name }}"
        rows="{{ isset($rows) ? $rows : '5' }}"
    >{{ old($name, (isset($value) ? $value : $slot)) }}</textarea>
    @if ($errors->has($name))
        <div class="invalid-feedback">
            {{ $errors->first($name) }}
        </div>
    @endif
</div>