{{-- resources/views/recipe.blade.php --}}
<x-app-layout>
    <x-slot name="title">
        Receta
    </x-slot>
    @livewire('recipes.detail-recipe', ['recipe' => $recipe])
</x-app-layout>
