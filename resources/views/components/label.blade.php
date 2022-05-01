@props(['value'])

<label {{ $attributes->merge(['class' => 'organosoft-label']) }}>
    {{ $value ?? $slot }}
</label>
