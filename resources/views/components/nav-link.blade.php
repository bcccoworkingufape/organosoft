@props(['active'])

@php
$classes = ($active ?? false)
            ? 'font-extrabold flex items-center border-b-2 border-solid border-b-white'
            : 'font-bold flex items-center';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
