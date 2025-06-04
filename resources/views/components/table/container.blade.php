@props(['variant' => 'default'])
@php
    $container = match ($variant) {
        default     => '',
        'main'      => 'bg-slate-200 flex flex-col shadow shadow-slate-500',
        'table'     => 'overflow-auto',
        'button'    => 'flex justify-center gap-2',
        'heading'   => 'bg-slate-100 flex justify-between items-center my-2',
        'footing'   => 'flex justify-between p-3',
    }
@endphp

<div {{ $attributes->merge(['class' => "$container"]) }}>{{ $slot }}</div>