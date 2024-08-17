<div>
    <div class="bg-secondary-50 shadow-md rounded-md p-4">
        <form wire:submit.prevent="search">
            {{ $this->form }} <!-- Asegúrate de que el formulario esté correctamente renderizado -->
    
            <button class="mt-5 bg-secondary-800 text-primary text-sm p-2 rounded hover:bg-secondary-900 hover:cursor-pointer" type="submit">
                Buscar
            </button>
        </form>
    </div>

    <div class="w-full flex justify-center mt-6">
        <div class="grid grid-cols-1 gap-4">
            @forelse($recipes as $recipe) <!-- Usa $recipes en lugar de $this->recipes -->
                <x-recipe.feed-card :recipe="$recipe" />
            @empty
                <div class="text-center py-4 text-secondary-500/80">
                    <p>!Encuentra nuevas recetas!</p>
                </div>
            @endforelse
        </div>
    </div>

    <x-filament-actions::modals /> <!-- Verifica que este componente esté bien configurado -->
</div>
