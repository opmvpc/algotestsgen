@foreach ($options as $value => $option)
    <div class="custom-control custom-radio">
        <input
            type="radio"
            id="{{ $name . $loop->iteration }}"
            name="{{ $name }}"
            class="custom-control-input"
            value="{{ $value }}"
            {{ old($name, $valeur) === $value ? 'checked' : '' }}
        >
        <label class="custom-control-label" for="{{ $name . $loop->iteration }}">{{ $option }}</label>
    </div>
@endforeach
