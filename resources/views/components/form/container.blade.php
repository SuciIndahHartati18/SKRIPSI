@props(['variant' => 'default'])
@php
    $container = match($variant) {
        default         => '',
        'label-input'   => 'flex flex-col gap-1',
        'button'        => 'flex justify-end gap-2'
    }
@endphp

<div {{ $attributes->merge(['class' => "$container"]) }}>
    {{ $slot }}
</div>