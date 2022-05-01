@props(['type'])

@php
$types = [
    'date' => 'date',
    'datetime' => 'datetime-local',
    'month' => 'month',
    'week' => 'week',
    'time' => 'time'
]
@endphp

<input type="{{ isset($type) && in_array($type, array_keys($types)) ? $types[$type] : 'date' }}" {{ $attributes->merge(['class' => 'organosoft-datepicker', 'name' => '', 'id' => '']) }}>