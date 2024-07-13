<div {{ $attributes->merge(['class' => 'flex justify-center mt-5']) }}>

    <div class="w-full max-w-2xl">
        <div class="px-4 py-5 sm:p-6 bg-secondary-50 shadow sm:rounded-lg">
            <x-section-title>
                <x-slot name="title">{{ $title }}</x-slot>
                <x-slot name="description">{{ $description }}</x-slot>
            </x-section-title>
            <div class="mt-5">
                {{ $content }}
            </div> 
        </div>
    </div>
</div>
