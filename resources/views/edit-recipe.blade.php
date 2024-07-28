<x-app-layout>
    <x-slot name="title">
        Editar receta
    </x-slot>
    <div class="bg-secondary-50 shadow-md rounded-md p-4">
        @livewire('recipes.modify-recipe', ['record' => $recipe])
    </div>
</x-app-layout>
