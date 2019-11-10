<button type="submit"
    class="{{ isset($class) ? $class : 'btn btn-primary' }} mr-3"
>
{{ isset($icon) ? '' : '' }}
{{ isset($label) ? $label : 'Enregistrer' }}
</button>
