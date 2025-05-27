@props(['variant' => 'default'])
@php
    $span = match ($variant) {
        default     => '',
        'footing'   => 'w-full',
    }
@endphp

<div {{ $attributes->merge(['class' => "$span"]) }}>{{ $slot }}</div>