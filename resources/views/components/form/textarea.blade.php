<textarea {{ $attributes->merge(['class' => 'w-full bg-slate-100 text-slate-700 text-xl px-3 py-1 resize-none', 'rows' => '4']) }}>
    {{ $slot }}
</textarea>