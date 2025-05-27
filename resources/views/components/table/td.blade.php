@props(['variant' => 'default'])
@php
    $tdClass = match ($variant) {
        default => '',
        'head'  => 'font-semibold text-slate-100 text-lg text-center px-3 py-2 whitespace-nowrap',
        'body'  => 'font-medium text-slate-700 text-md text-center px-3 py-2 whitespace-nowrap',
    }
@endphp

<td {{ $attributes->merge(['class' => "$tdClass"]) }}>{{ $slot }}</td>