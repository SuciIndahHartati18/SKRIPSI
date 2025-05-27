@props(['variant' => 'default'])
@php
    $buttonClass = match ($variant) {
        default     => '',
        'delete'    => 'bg-red-500 font-medium text-slate-100 text-sm text-center px-3 py-1 transition delay-50 duration-200 hover:bg-red-600',
    }
@endphp

<button {{ $attributes->merge(['class' => "$buttonClass"]) }}>{{ $slot }}</button>