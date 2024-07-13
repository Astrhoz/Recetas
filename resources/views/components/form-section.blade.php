@props(['submit'])

<div {{ $attributes->merge(['class' => 'flex justify-center']) }}>
    <div class="w-full max-w-2xl mt-5">
        <form wire:submit="{{ $submit }}">
            <div class="px-4 py-5 bg-secondary-50 sm:p-6 shadow {{ isset($actions) ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-md' }}">
                <x-section-title>
                    <x-slot name="title">{{ $title }}</x-slot>
                    <x-slot name="description">{{ $description }}</x-slot>
                </x-section-title>
                <div class="grid grid-cols-6 gap-6 mt-4">
                    {{ $form }}
                </div>
            </div>

            @if (isset($actions))
                <div class="flex items-center justify-end px-4 py-3 bg-secondary-50 text-end sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                    {{ $actions }}
                </div>
            @endif
        </form>
    </div>
</div>
