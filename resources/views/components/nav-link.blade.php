@props(['active'])

@php
$classes = ($active ?? false)
            ? 'bg-slate-800 border-none text-slate-400 p-3 w-auto text-sm font-semibold'
            : 'border-none text-slate-400 p-3 w-auto text-sm font-semibold';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
