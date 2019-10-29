<div class="custom-control custom-switch">
    <input
        type="checkbox"
        class="custom-control-input"
        id="{{ $name }}"
        name="{{ $name }}"
        {{ old($name, $valeur) === true ? 'checked' : '' }}
    >
    <label class="custom-control-label" for="{{ $name }}">
        {{ isset($label) ? $label : title_case($name) }}
    </label>
</div>