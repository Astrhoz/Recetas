@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex items-center gap-3 rounded-lg bg-secondary-800/90 px-3 py-2 text-primary transition-all m-2'
            : 'flex items-center gap-3 rounded-lg px-3 py-2 text-secondary-400 transition-all hover:text-secondary-600';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{-- HomeIcon --}}
    {{ $slot }}
</a>
