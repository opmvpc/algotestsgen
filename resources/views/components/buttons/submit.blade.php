<button type="submit"
    class="{{ isset($class) ? $class : 'btn btn-primary' }}"
>
{{ isset($icon) ? '' : '' }}
{{ isset($label) ? $label : 'Enregistrer' }}
</button>