<x-app-layout>
    <x-slot name="title">
        Crear nueva receta
    </x-slot>
    <div class="bg-secondary-50 shadow-md rounded-md p-4">
        @livewire('recipes.create-recipe')
    </div>
</x-app-layout>