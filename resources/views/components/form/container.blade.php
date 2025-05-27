@props(['variant' => 'default'])
@php
    $container = match($variant) {
        default         => '',
        'label-input'   => 'flex items-center',
        'button'        => 'flex justify-end gap-2'
    }
@endphp

<div {{ $attributes->merge(['class' => "$container"]) }}>
    {{ $slot }}
</div>