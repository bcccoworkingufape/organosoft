@props(['active'])

@php
$classes = ($active ?? false)
            ? 'organosoft-menu font-extrabold flex items-center border-b-2 border-solid border-b-white'
            : 'organosoft-menu font-bold flex items-center';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
