@props(['variant' => 'default'])
@php
    $link = match ($variant) {
        default     => '',
        'create'    => 'inline-block w-fit bg-rose-900 font-bold text-slate-100 text-xl px-3 py-1 transition delay-50 duration-200 hover:bg-rose-500',
        'edit'      => 'inline-block bg-green-500 font-medium text-slate-100 text-sm text-center px-3 py-1 transition delay-50 duration-200 hover:bg-green-600',
    }
@endphp

<a {{ $attributes->merge(['class' => "$link"]) }}>{{ $slot }}</a>