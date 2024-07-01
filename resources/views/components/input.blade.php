@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-secondary-300/80 bg-secondary-50 text-secondary-800/70 focus:border-primary-200 focus:ring-primary-200 rounded-md shadow-sm placeholder:text-secondary-600/50 placeholder:text-sm h-10']) !!}>
