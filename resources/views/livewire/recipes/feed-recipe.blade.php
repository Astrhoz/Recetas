<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 gap-4">
        @forelse($this->recipes as $recipe)
            <x-recipe.feed-card :recipe="$recipe" />
        @empty
            <div class="text-center py-4 text-secondary-500/80">
                <p>No se encontraron recetas que coincidan con tu búsqueda.</p>
            </div>
        @endforelse
    </div>
    <div class="my-3">{{$this->recipes->links()}}</div>
</div>
