<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 gap-4">
        @foreach($recipes as $recipe)
            <x-recipe.feed-card :recipe="$recipe" />
        @endforeach
    </div>
</div>
