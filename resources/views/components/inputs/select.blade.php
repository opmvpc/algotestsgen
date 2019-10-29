<div class="form-group">
    <label for="{{ $name }}">{{ isset($label) ? $label : title_case($name) }}</label>
    <select
        id="{{ $name }}"
        name="{{ $name }}"
        class="form-control {{ $errors->has($name) ? ' is-invalid' : '' }}"
    >
        <option disabled>Selectionnez une option</option>
        @foreach ($options as $id => $text)
            <option
                value="{{ $id }}"
                {{ $valeur === $id ? 'selected' : '' }}
            >
                {{ $text }}
            </option>
        @endforeach
    </select>
    @if ($errors->has($name))
        <div class="invalid-feedback">
            {{ $errors->first($name) }}
        </div>
    @endif
</div>