@props(['name', 'id', 'value'])

<label for="{{ $id }}">
    <input class="organosoft-radio" type="radio" name="{{ $name }}" id="{{ $id }}" value="{{ isset($value) ?? $value }}">
    {{ $slot }}
</label>