<div class="custom-control custom-checkbox">
    {{-- cas ou pas cochée --}}
    <input
    type="hidden"
    name="{{$name}}"
    type="checkbox"
    value="0"
    >

    <input
        type="checkbox"
        class="custom-control-input {{ $errors->has($name) ? ' is-invalid' : '' }}"
        name="{{ $name }}"
        id="{{ $name }}"
        value="1"
        {{ old($name, $valeur) === 1 ? ' checked' : '' }}
    >
    <label class="custom-control-label" for="{{ $name }}">
        {{ title_case($label) }}
    </label>

    @if ($errors->has($name))
        <div class="invalid-feedback">
            {{ $errors->first($name) }}
        </div>
    @endif

</div>