<div class="form-group">
    <label for="{{ $name }}">{{ isset($label) ? $label : title_case($name) }}</label>
    <select
        multiple
        id="{{ $name }}"
        name="{{ $name .'[]' }}"
        class="form-control {{ $errors->has($name) ? ' is-invalid' : '' }}"
    >
        <option disabled>Selectionnez une ou plusieurs options</option>
        @foreach ($options as $id => $text)
            <option
                value="{{ $id }}"
                {{ in_array($id, $valeurs) ? 'selected' : '' }}
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