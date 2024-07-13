@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-secondary-400 text-start text-secondary-900 bg-secondary-50 focus:outline-none focus:text-secondary-800 focus:bg-secondary-100 focus:border-secondary-700 transition duration-150 ease-in-out'
            : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-secondary-400 hover:text-secondary-600 hover:bg-secondary-50 hover:border-secondary-300 focus:outline-none focus:text-secondary-800 focus:bg-secondary-50 focus:border-secondary-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
