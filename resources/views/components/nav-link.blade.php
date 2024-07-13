@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-secondary-500 text-sm font-medium leading-5 text-secondary-900 focus:outline-none focus:border-secondary-700 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-secondary-400 hover:text-secondary-600 hover:border-secondary-300 focus:outline-none focus:text-secondary-600 focus:border-secondary-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
