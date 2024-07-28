<x-app-layout>
    <x-slot name="title">
        Feed
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-4">
            <x-recipe.feed-card />
        </div>
    </div>
</x-app-layout>
