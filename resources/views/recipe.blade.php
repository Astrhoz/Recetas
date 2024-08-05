{{-- resources/views/recipe.blade.php --}}
<x-app-layout>
    <x-slot name="title">
        Receta #{{ $recipe->id }}
    </x-slot>
    @livewire('detail-recipe', ['record' => $recipe])
</x-app-layout>
