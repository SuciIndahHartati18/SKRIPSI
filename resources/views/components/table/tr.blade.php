@props(['variant' => 'default'])
@php
    $trClass = match ($variant) {
        default => '',
        'head'  => 'bg-rose-900 border-b-2 border-slate-500',
        'body'  => 'odd:bg-slate-200 even:bg-slate-100',
    }
@endphp

<tr {{ $attributes->merge(['class' => "$trClass"]) }}>{{ $slot }}</td>